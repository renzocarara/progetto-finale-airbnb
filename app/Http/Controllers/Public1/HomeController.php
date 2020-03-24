<?php

namespace App\Http\Controllers\Public1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Info;
use App\Message;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session; 




class HomeController extends Controller
{
    public function index() {

        $apartments = Apartment::all()->shuffle();
        //   seleziono dal db solo gli apt sponsorizzati
        $apt_sponsor = Apartment::all()->shuffle();


        return view('public.home', ["apartments"=>$apartments, 'apts_sponsor'=>$apt_sponsor]);
    }

    public function show(Apartment $apartment) {

      $Key = 'apartment/' . $apartment->id;
      // dd($Key);
         // if (\Session::has($Key)) {

          DB::table('apartments')
           ->where('id', $apartment->id)
           ->increment('views', 1);
           // \Session::put($Key, 1);
          // }

        return view('public.show', ["apartment"=>$apartment]);
    }
    public function mail(Request $request, Apartment $apartment) {

        $request->validate([
            // tabella messages
            'message' => 'required|max:1000', // richiesto e massimo lungo 1000caratteri
        ]);

        $form_data_received = $request->all();

        // creo un nuovo record da scrivere nella tabella "requests"
        $new_message = new Message();

        $new_message->fill($form_data_received);
        $new_message->apartment_id=$apartment->id;

        // salvo messaggio nel DB
        $new_message->save();

        return view('public.message_sent', ["apartment"=>$apartment, 'new_message' => $new_message]);
    }
    public function go_back() {

        return back();
    }



}
