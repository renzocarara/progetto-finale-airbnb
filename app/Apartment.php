<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    public function info() {
        // ho una relazione 1 a 1 con la tabella info (la parte dipendente che ha FK)
        // questa è la parte che comanda
        return $this->hasOne('App\Info');

    }

    // relazione 1 a n tra apartments e requests
    public function requests() {
        // ho una relazione 1 a n con la tabella requests (la parte dipendente che ha FK)
        // questa è la parte che comanda
        return $this->hasMany('App\Request');

    }

    public function user() {
        // ho una relazione 1 a n con la tabella users
        return $this->belongsTo('App\User');

    }

    public function sponsorships() {
        // ho una relazione 1 a n con la tabella sponsorship (la parte dipendente che ha FK)
        // questa è la parte che comanda
        return $this->hasMany('App\Sponsorship');

    }

    public function services() {
        return $this->belongsToMany('App\Service');
    }
}
