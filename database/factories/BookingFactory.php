<?php

use App\Booking;
use App\Car;
use App\User;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    $car = Car::inRandomOrder()->first();
    return [
        'car_id' => $car->id,
        'user_id' => $user->id,
        'days' => $faker->randomNumber(2,true),
        'cost' => $faker-> randomFloat(2,100,10000)
    ];
});
