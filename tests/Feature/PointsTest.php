<?php

namespace Tests\Feature;

use App\Sound;
use App\Points;
use Tests\TestCase;
use App\Events\UserEarnedPoints;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointsTest extends TestCase
{
    use RefreshDatabase;
    public function tests_an_event_is_fired_when_points_are_awarded()
    {
        Event::fake();

        $points = new Points;
        $points->awardPoints($this->signIn(), 100);
        $points->save();

        Event::assertDispatched(UserEarnedPoints::class, function ($event) {
            return auth()->user()->is($event->user) && $event->points == 100 && $event->totalPoints == 100;
        });
    }
    public function tests_creating_a_sound_awards_points()
    {
        $this->signIn();
        $this->createSound();
        $this->assertDatabaseHas('points', ['user_id' => 1, 'points' => 100]);
        $this->deleteSoundFile();
    }

    public function tests_points_are_awarded_when_another_user_likes_your_sound()
    {
        $this->signIn();
        $this->createSound();
        $sound = Sound::first();

        $this->post('/sounds/' . $sound->id . '/likes');

        $this->assertDatabaseHas('points', ['points' => 200]);
    }
}
