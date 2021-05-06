<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product_Detail;
use Faker\Generator as Faker;

$factory->define(Product_Detail::class, function (Faker $faker) {
    return [
        // 'color_rgb'=>$faker->rgbColor,
        // 'color_name'=>$faker->colorName,
        'price' => 149.99,
        'stock'=>$faker->numberBetween(1,10),
        'discount'=>$faker->numberBetween(0,90),
       // 'main_image'=>'assets/images/main_product_image.jpg'
    ];
});
