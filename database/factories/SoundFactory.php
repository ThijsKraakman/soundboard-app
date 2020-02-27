<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Sound;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Sound::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        // 'file' => UploadedFile::fake()->image('avatar.jpg'),
        // 'owner_id' => factory(User::class),
    ];
});
