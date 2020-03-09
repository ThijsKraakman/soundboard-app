<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    public function tests_it_has_a_username()
    {
        $profile = factory(User::class)->create(['username' => 'A username']);
        $this->assertEquals('A username', $profile->username);
    }

    public function tests_it_has_points()
    {
        $profile = factory(User::class)->states('withSounds')->create();
        $this->assertNotNull($profile->points());
    }
}
