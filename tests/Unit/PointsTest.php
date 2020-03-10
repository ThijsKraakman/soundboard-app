<?php

namespace Tests\Unit;

use App\Points;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointsTest extends TestCase
{
    use RefreshDatabase;

    public function tests_it_belongs_to_a_user()
    {
        $points = factory(Points::class)->create();
        $this->assertEquals(1, $points->user_id);
    }

    public function tests_it_has_points()
    {
        $points = factory(Points::class)->create(['points' => 100]);
        $this->assertEquals(100, $points->points);
    }
}
