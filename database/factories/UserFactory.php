<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Points;
use App\User;
use App\Sound;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->word(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreatingState(User::class, 'withSounds', function ($user, Faker $faker) {
    factory(Sound::class, rand(5, 10))->create([
        'owner_id' => $user->id,
        'file' => 'sounds/file.mp3',
        'points' => rand(1, 20)
        ]);
});

$factory->afterCreatingState(User::class, 'withPoints', function ($user, Faker $faker) {
    factory(Points::class)->create([
        'user_id' => $user->id,
        'points' => $faker->numberBetween(100, 10000)
    ]);
});
