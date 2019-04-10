<?php

use App\Raspberry;
use App\Sensor;
use App\Type;
use Faker\Generator as Faker;

$factory->define(Sensor::class, function (Faker $faker) {
    return [
        'address' => $faker->macAddress,
        'type_id' => Type::first()->id,
        'raspberry_id' => Raspberry::first()->id,
        'name' => $faker->name,
        'refreshInterval' => $faker->numberBetween(2,50)
    ];
});
