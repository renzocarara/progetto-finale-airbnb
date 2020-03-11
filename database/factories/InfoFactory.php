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

        // 'apartment_id' => $faker->numberBetween(1,20),
        // 'summary' => $faker->unique()->text,
        // 'room_num' => 'Italy',
        // 'beds_num' => $faker->streetName,
        // 'bathroom_num' => $faker->numberBetween(1,99),
        // 'sq_mt' => $faker->postcode,
        // 'image' => $faker->latitude($min = -90, $max = 90),
    ];
});
