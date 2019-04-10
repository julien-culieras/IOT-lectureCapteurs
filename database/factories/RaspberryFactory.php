<?php

use App\Raspberry;
use Faker\Generator as Faker;

$factory->define(Raspberry::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->macAddress,
        'state' => $faker->boolean,
        'state' => $faker->boolean,
    ];
});
