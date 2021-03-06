<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'model' => $faker -> word,
        'kW' => $faker -> numberBetween(70, 400),
    ];
});
