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

         'apartment_id' => $faker->unique()->numberBetween(1,30),
         'summary' => $faker->text($maxNbChars = 400),
         'room_num' => $faker->numberBetween(1, 8),
         'beds_num' => $faker->numberBetween(1, 10),
         'bathroom_num' => $faker->numberBetween(1,3),
         'sq_mt' => $faker->numberBetween(20,200),
         'image' => $faker->randomElement(['uploads/apt_image1.jpeg', 'uploads/apt_image2.jpeg', 'uploads/apt_image3.jpeg',
         'uploads/apt_image4.jpeg', 'uploads/apt_image5.jpeg', 'uploads/apt_image6.jpeg', 'uploads/apt_image7.jpeg'])
    ];
});
