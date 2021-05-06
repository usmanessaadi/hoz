<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User_Address;
use Faker\Generator as Faker;

$factory->define(User_Address::class, function (Faker $faker) {
    return [
        //
        'address' => $faker->address,
        'full_name' => $faker->firstName. $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'street' => $faker->streetName,
        'apartment_unit_etc' => $faker->streetAddress,
        'country' => $faker->country,
        'state' => $faker->state,
        'city' => $faker->city,
        'zip_code' => $faker->countryCode,
//       'user_id' => $faker->numberBetween(1,20),
    ];
});
