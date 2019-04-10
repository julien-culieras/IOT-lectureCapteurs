<?php

use App\Record;
use App\Sensor;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(5, 200),
        'sensor_id' => Sensor::first()->id,
        'recorded_at' => $faker->dateTimeThisMonth()
    ];
});
