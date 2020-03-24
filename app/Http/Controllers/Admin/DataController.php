<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function message(Apartment $apartment) {
        
        if (Auth::user()->id == $apartment->user_id){
            $messages = Message::where('apartment_id', $apartment->id)->get();

            return view('admin.request', ['apartment' => $apartment, 'messages' => $messages]);
        } else {
            // l'appartamento in aggiornamento non appartiene all'utente loggato
            // visualizzo una pagina che lo informa
            return view('admin.not_authorized');
        } 
    }
}

