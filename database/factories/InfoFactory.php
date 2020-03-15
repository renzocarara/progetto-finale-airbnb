<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Info;
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

$factory->define(Info::class, function (Faker $faker) {
    return [

         'apartment_id' => $faker->unique()->numberBetween(1,20),
         'summary' => $faker->unique->sentence($nbWords = 10, $variableNbWords = true),
         'room_num' => $faker->numberBetween(1, 8),
         'beds_num' => $faker->numberBetween(1, 10),
         'bathroom_num' => $faker->numberBetween(1,3),
         'sq_mt' => $faker->numberBetween(20,200),

        // qui si potrebbe usare una randomElement() su un array di 20 immagini diverse
         'image' => 'uploads/default_apt_image.jpeg'
    ];
});
