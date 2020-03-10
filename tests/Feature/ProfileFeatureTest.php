<?php

namespace Tests\Feature;

use App\User;
use App\Sound;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function tests_when_registering_points_are_linked()
    {
        $this->signIn();
        $user = factory(User::class)->states('withPoints')->create();

        $this->assertDatabaseHas('users', $user->toArray());
        $this->assertDatabaseHas('points', ['user_id' => $user->id]);
    }

    public function tests_a_profile_can_be_viewed()
    {
        $this->signIn();
        $user = factory(User::class)->create();

        $this->get('/profile/' . $user->username)
            ->assertSee($user->username);
    }

    public function tests_a_profiles_points_can_be_viewed()
    {
        $this->signIn();
        $user = factory(User::class)->states('withSounds')->create();
        $this->get('/profile/' . $user->username)
            ->assertSee($user->getPoints());
    }

    public function tests_a_profiles_unlocked_achievements_can_be_viewed()
    {

    }

}
