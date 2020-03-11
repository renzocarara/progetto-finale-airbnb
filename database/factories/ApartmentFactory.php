<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Apartment::class, function (Faker $faker) {
    return [

        'user_id' => $faker->numberBetween(1,20),
        'title' => $faker->text,
        'state' => 'Italy',
        'city' => $faker->randomElement(['Milano','Roma','Torino','Napoli','Palermo','Bari','Venezia','Firenze','Bologna','Genova']),
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1,99),
        'zip' => $faker->postcode,
        'lon' => $faker->latitude($min = -90, $max = 90),
        'lat' => $faker->longitude($min = -180, $max = 180),
        'views' => $faker->numberBetween(1,5000),
    ];
});
