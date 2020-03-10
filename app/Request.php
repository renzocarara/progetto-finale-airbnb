<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
