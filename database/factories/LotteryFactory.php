<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lottery;
use Faker\Generator as Faker;

$factory->define(Lottery::class, function (Faker $faker) {
    return [
        'uname' => uniqid()
    ];
});
