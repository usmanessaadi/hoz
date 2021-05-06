<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gate;
use Faker\Generator as Faker;

$factory->define(Gate::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'description' => $faker->realText(200,true),
        'brand' => $faker->realText(20  ,true),
        'dimensions' => $faker->numberBetween(10,80).'X'.$faker->numberBetween(10,80),
        'product_id' => factory(\App\Product::class)->create()->id
    ];
});
