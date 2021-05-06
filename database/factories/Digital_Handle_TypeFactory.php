<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Digital_Handle_Type;
use Faker\Generator as Faker;

$factory->define(Digital_Handle_Type::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'video' => 'https://www.youtube.com/watch?v=B9WCGVvA7po',
        'icon' => 'assets/icons/handle_icon.jpg',
    ];
});
