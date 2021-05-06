<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Digital_Lock_Type;
use Faker\Generator as Faker;

$factory->define(Digital_Lock_Type::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'video' => 'https://www.youtube.com/watch?v=B9WCGVvA7po',
        'icon' => 'assets/icons/lock_icon.jpg',
    ];
});
