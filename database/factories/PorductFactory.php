<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        //  $table->string('product_name');
        //            $table->mediumText('description')->nullable();
        //            $table->string('brand');
        //            $table->string('color_rbg');
        //            $table->integer('warranty');
        //            $table->float('price');
        //            $table->integer('discount');
        //            $table->integer('stock');

        'product_name' => $faker->name,
        'description' => $faker->realText(200,true),
        'brand' => $faker->realText(20  ,true),
        'color_rbg' => $faker->rgbColor,
        'warranty' => $faker->numberBetween(0,1),
        'price' => 12.2,
        'discount' => $faker->numberBetween(0,1),
        'stock' => $faker->numberBetween(0,30),




    ];
});
