<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserInformation;
use Faker\Generator as Faker;

$factory->define(UserInformation::class, function (Faker $faker) {
    return [
        'user_id' => (factory(User::class)),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' =>  $faker->address,
        'telephone_number' => $faker->phoneNumber
    ];
});
