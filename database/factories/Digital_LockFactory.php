<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Digital_Lock;
use Faker\Generator as Faker;

$factory->define(Digital_Lock::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'description' => $faker->realText(200,true),
        'brand' => $faker->realText(20  ,true),

        'fingerprint' => $faker->boolean,
        'physical_key' => $faker->boolean,
        'bluetooth' => $faker->boolean,
        'pin' => $faker->boolean,
        'rfid_card' => $faker->boolean,
        'wifi' => $faker->boolean,
        'nfc' => $faker->boolean,
        'product_id' => factory(\App\Product::class)->create()->id

    ];
});
