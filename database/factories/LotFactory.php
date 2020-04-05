<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lot;
use Faker\Generator as Faker;

$factory->define(Lot::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word
    ];
});
