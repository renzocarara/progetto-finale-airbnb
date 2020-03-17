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

      $apartments = Apartment::all();


        return view('public.home', ["apartments"=>$apartments]);
    }

    public function show($id) {

        $apartment = Apartment::find($id);
        // dd ($apartment);

        return view('public.show', ["apartment"=>$apartment]);
    }
}
