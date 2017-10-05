<?php

use App\Car;
use App\State;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $state = State::inRandomOrder()->first();
    return [
        'plate_number' => $faker->randomElement(['KBZ 156K','KBX 569U', 'KBQ 569L','KCD 001M']),
        'model' => $faker->randomElement( ['Ferrari','Toyota','Nissan','Tesla']),
        'capacity' => $faker->randomNumber(2,true),
        'state_id' => $state->id
    ];
});
