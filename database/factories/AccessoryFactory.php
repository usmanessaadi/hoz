<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Accessory;
use Faker\Generator as Faker;

$factory->define(Accessory::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'description' => $faker->realText(200,true),
        'brand' => $faker->realText(20  ,true),
        'product_id' => factory(\App\Product::class)->create()->id
    ];
});
