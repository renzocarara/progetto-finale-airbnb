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

        // creo un nuovo record da scrivere nella tabella "requests"
        $new_message = new Message();

        $new_message->fill($form_data_received);
        $new_message->apartment_id=$apartment->id;

        // salvo messaggio nel DB
        $new_message->save();

        // dove lo mando???
        return view('public.show', ["apartment"=>$apartment]);
    }
}
