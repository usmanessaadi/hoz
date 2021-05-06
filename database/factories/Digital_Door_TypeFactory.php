<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Digital_Door_Type;
use Faker\Generator as Faker;

$factory->define(Digital_Door_Type::class, function (Faker $faker) {
    return [
        //$table->string('name');
        //            $table->string('video');
        //            $table->string('icon')
        'name' => $faker->name,
        'video' => 'https://www.youtube.com/watch?v=B9WCGVvA7po',
        'icon' => 'assets/icons/door_icon.jpg',
    ];
});
