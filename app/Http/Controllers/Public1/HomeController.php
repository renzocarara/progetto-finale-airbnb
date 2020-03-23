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




class HomeController extends Controller
{
    public function index() {

        $apartments = Apartment::all()->shuffle();
        //   seleziono dal db solo gli apt sponsorizzati
        $apt_sponsor = Apartment::all()->shuffle();


        return view('public.home', ["apartments"=>$apartments, 'apts_sponsor'=>$apt_sponsor]);
    }

    public function show($id) {

        $apartment = Apartment::find($id);
        // dd ($apartment);

        return view('public.show', ["apartment"=>$apartment]);
    }
    public function mail(Request $request, Apartment $apartment) {

        $form_data_received = $request->all();
        //dd ($form_data_received);

        // creo un nuovo record da scrivere nella tabella "requests"
        $new_message = new Message();

        // $new_message->push($request['mail'], $request['message'])

        // $new_message->email=$form_data_received['email'];
        // $new_message->message=$form_data_received['message'];

        // $new_message->fill($form_data_received);
        // $new_message->fill(($apartment->id));
        //
        // $new_message->save();

// dd($apartment->id);

         DB::table('messages')->update(['apartment_id' => $apartment->id]);
         DB::table('messages')->update(['email' => $form_data_received['email']]);
         DB::table('messages')->update(['message' => $form_data_received['message']]);

        //
        // $apt_id = DB::table('apartments')->latest()->first()->id;
        // $new_message->apartment_id=$apt_id;



        // dd ($new_message);










        // $apartment = Apartment::find($id);

        // dove lo mando???
        return view('public.show', ["apartment"=>$apartment]);
    }
}
