<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User_Saved_Product;
use Faker\Generator as Faker;

$factory->define(User_Saved_Product::class, function (Faker $faker) {
    return [
        // unique()->numberBetween(1, 20)
        'user_id' => $faker->numberBetween(1,20),
        'product_id' => $faker->numberBetween(1,20),
    ];
});
