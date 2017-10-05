<?php

use App\Car;
use App\State;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $state = State::inRandomOrder()->first();
    return [
        'plate_number' => 'KBZ 156K',
        'model' => $faker->text,
        'capacity' => $faker->randomNumber(2,true),
        'state_id' => $state->id
    ];
});
