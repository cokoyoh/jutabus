<?php

use App\Transport;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transport::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    return [
        'name_of_good' => $faker->text(200),
        'description' => $faker->paragraph(3,true),
        'origin' => $faker->city,
        'destination' => $faker->city,
        'cost' => $faker->randomFloat(2,100,10000),
        'user_id' => $user->id
    ];
});
