<?php

namespace Tests\Feature;

use App\Sound;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesTest extends TestCase
{
    use RefreshDatabase;
    public function tests_a_user_can_like_a_sound()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $this->createSound();
        $sound = Sound::first();

        $this->post('sounds/ ' . $sound->id . '/likes');

        $this->assertCount(1, $sound->likes);
        $this->assertDatabaseHas('likes', [
            'sound_id' => $sound->id,
            'user_id' => 1
        ]);
    }

    public function tests_a_user_can_unlike_a_sound()
    {
        $this->signIn();
        $this->createSound();
        $sound = Sound::first();

        $this->post('sounds/ ' . $sound->id . '/likes');
        $this->post('sounds/ ' . $sound->id . '/likes');

        $this->assertCount(0, $sound->likes);
        $this->assertDatabaseMissing('likes', [
            'sound_id' => $sound->id,
            'user_id' => 1
        ]);
    }
}
