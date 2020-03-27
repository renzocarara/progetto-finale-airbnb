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
      return $meters;
    }

    //
    public function search(Request $request) {

        $request->validate([
            'place' => 'required|max:50'
        ]);

        $data = $request->all();

        if (isset($data['apts_sponsor'])) {
            // leggere dalla tabella apartments tutti gli appartamentoi con sponsorship attive
            // uso l'array apts_sponsor, che contiene un elenco di id, degli appartamenti con sponsor attive
            $apts_sponsor = Apartment::whereIn('id', $data['apts_sponsor'])->get()->shuffle();
        } else {
            $apts_sponsor = [];
        }

        // lat e lon della località inserita dall'utente
        $lat1= $data['lat'];
        $lon1= $data['lon'];

        $apartments = Apartment::whereNotIn('id', $data['apts_sponsor'])->get();

        $nearby_apts = [];

        foreach ($apartments as $apartment) {
            $lat2= $apartment->lat;
            $lon2= $apartment->lon;

            $distance = $this->get_distance($lat1, $lon1, $lat2, $lon2);

            if($distance <= 20000) {

                $nearby_apt = Apartment::where('id', $apartment->id)->get();
                
                array_push($nearby_apts, $nearby_apt);
            }
        }

        return view('public.search', ['nearby_apts' => $nearby_apts, 'apts_sponsor' => $apts_sponsor, 'place' => $data['place']]);
    }
}
