<?php

namespace App\Http\Controllers\Public1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;

class SearchController extends Controller
{
    //
    public function search(Request $request) {


        //
        $data = $request->all();
        // leggere dalla tabella apartments tutti gli appartamentoi con sponsorship attive
        // uso l'array apts_sponsor, che contiene un elenco di id, degli appartamenti con sponsor attive
        $apt_sponsor = Apartment::whereIn('id', $data['apts_sponsor'])->get();

        $places = Apartment::where('city', $data['place'])->get();

        return view('public.search', ['places' => $places, 'apts_sponsor' => $apt_sponsor]);
    }
}
