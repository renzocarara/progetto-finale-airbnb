<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;


use App\Apartment;
use App\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;


class HomeController extends Controller
{
    // funzione per visualizzare la home page per l'utente autenticato
    public function index()
    {
        return view('admin.home');
    }


    // funzione per visualizzare i dati del profilo dell'utente
    public function account() {
        App::setLocale('it');
        // recupero l'utente corrente
        // $user = Auth::user();
        // recupero i dettagli dell'utente corrente tramite la relazione uno a uno
        $user_details =Auth::user();
        // ritorno la view admin.account e le passo i dettagli utente
        return view('admin.account', ['user_details' => $user_details]);
    }

}
