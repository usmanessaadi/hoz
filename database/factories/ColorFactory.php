<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    return [
        //
        'color_rgb'=>"$faker->rgbColor",
        'color_name'=>$faker->colorName,
    ];
});
