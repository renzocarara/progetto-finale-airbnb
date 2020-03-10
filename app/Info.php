<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
    // ho una relazione 1 a 1
    // questa è la parte dipendente della relazione, cioè quella che ha la FK
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
