<?php

use App\User;
use App\Sound;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'developer@test.com',
            'password' => bcrypt('secret')
        ])->each(function ($user) {
            factory(Sound::class, rand(5,10))->create(['owner_id' => $user->id, 'file' => 'sounds/file.mp3']);
        });
    }
}
