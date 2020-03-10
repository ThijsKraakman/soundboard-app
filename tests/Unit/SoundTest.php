<?php

namespace Tests\Unit;

use App\Sound;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SoundTest extends TestCase
{
    use RefreshDatabase;
    public function tests_it_has_a_title()
    {
        $sound = factory(Sound::class)->create(['title' => 'A sound']);
        $this->assertEquals('A sound', $sound->title);
    }

    public function tests_it_has_a_description()
    {
        $sound = factory(Sound::class)->create(['description' => 'A description']);
        $this->assertEquals('A description', $sound->description);
    }

    public function tests_it_has_a_file_path()
    {
        $sound = factory(Sound::class)->create(['file' => '/sounds/file.mp3']);
        $this->assertEquals('/sounds/file.mp3', $sound->file);
    }

    public function tests_it_has_an_owner()
    {
        $sound = factory(Sound::class)->create();
        $this->assertEquals(1, $sound->owner_id);
    }
}
