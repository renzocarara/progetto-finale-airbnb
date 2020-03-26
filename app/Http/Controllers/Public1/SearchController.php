<?php

namespace App\Http\Controllers\Public1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;

class SearchController extends Controller
{
    //
    public function search(Request $request) {
        
        $request->validate([
            // tabella apartments
            'place' => 'required|max:50'
        ]);

        $data = $request->all();
        
        $lat1= $data['lat'];;
        $lon1= $data['lon']; 
        
        $apartments = Apartment::all();

        $distanze =[];

        foreach ($apartments as $apartment) {
            $lat2= $apartment->lat;
            $lon2= $apartment->lon;

            $distance = (3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180); 
            
            array_push($distanze, $distance);
            
        }

        dd($distanze);
 

        // leggere dalla tabella apartments tutti gli appartamentoi con sponsorship attive
        // uso l'array apts_sponsor, che contiene un elenco di id, degli appartamenti con sponsor attive
        $apt_sponsor = Apartment::whereIn('id', $data['apts_sponsor'])->get()->shuffle();

        $places = Apartment::where('city', $data['place'])->get();

        return view('public.search', ['places' => $places, 'apts_sponsor' => $apt_sponsor,
                    'place' => $data['place']]);
    }
}
