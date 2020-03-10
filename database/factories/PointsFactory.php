<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Points;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

$factory->define(Points::class, function (Faker $faker) {
    return [
        'user_id' => Auth::user()->id ?? factory(User::class),
        'points' => $faker->randomNumber()
    ];
});
