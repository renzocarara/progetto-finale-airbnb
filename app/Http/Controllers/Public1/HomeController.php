<?php

namespace App\Http\Controllers\Public1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Info;



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
}
