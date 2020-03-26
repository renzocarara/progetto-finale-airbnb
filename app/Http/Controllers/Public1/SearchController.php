<?php

namespace App\Http\Controllers\Public1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;

class SearchController extends Controller
{

    public static function get_distance($latitude1, $longitude1, $latitude2, $longitude2) {
      $theta = $longitude1 - $longitude2;
      $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
      $miles = acos($miles);
      $miles = rad2deg($miles);
      $miles = $miles * 60 * 1.1515;
      // $feet = $miles * 5280;
      // $yards = $feet / 3;
      $kilometers = $miles * 1.609344;
      $meters = $kilometers * 1000;
      return compact('meters');
    }

    //
    public function search(Request $request) {

        $request->validate([
            'place' => 'required|max:50'
        ]);

        $data = $request->all();

        // lat e lon della località inserita dall'utente
        $lat1= $data['lat'];
        $lon1= $data['lon'];

        $apartments = Apartment::all();

        $distanze =[];

        foreach ($apartments as $apartment) {
            $lat2= $apartment->lat;
            $lon2= $apartment->lon;

            $distance = $this->get_distance($lat1, $lon1, $lat2, $lon2);
            //$distance = (3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180);

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
