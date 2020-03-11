<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Sound;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

$factory->define(Sound::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'file' => '/sounds/' . $faker->word,
        'image' => '/images/' . $faker->word,
        'owner_id' => Auth::user()->id ?? factory(User::class),
    ];
});
