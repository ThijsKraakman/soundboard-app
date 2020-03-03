<?php

namespace Tests\Feature;

use App\User;
use App\Sound;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SoundFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function tests_a_sound_can_be_created()
    {
        $this->signIn();
        $this->get('/sounds/create')
            ->assertStatus(200);

        $sound = factory(Sound::class)->make();
        $file = $this->createFile();

        $data =  [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ];

        $this->post('/sounds', $data)->assertRedirect('/sounds');

        $this->assertFileExists($file);
        $this->assertDatabaseHas('sounds', $sound->toArray());

        $this->deleteFile();
    }

    public function tests_a_sound_can_be_retrieved()
    {
        $this->signIn();
        $sound = factory(Sound::class)->make();
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create('sound.mp3', 100);

        $data =  [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ];

        $this->post('/sounds', $data)->assertRedirect('/sounds');

        $this->get('/sounds')
            ->assertSee($data['title'])
            ->assertSee($data['description']);

        $this->deleteFile();
    }
    public function tests_a_sound_belongs_to_an_owner()
    {
        $this->signIn();
        $sound = factory(Sound::class)->make();
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create('sound.mp3', 100);

        $this->post('/sounds', [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ])->assertRedirect('/sounds');

        $this->assertDatabaseHas('sounds', $sound->toArray());

        $this->deleteFile();
    }

    public function tests_only_audio_files_can_be_stored()
    {
        $this->signIn();

        $this->get('/sounds/create')
            ->assertStatus(200);

        $sound = factory(Sound::class)->make();
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create('file.pdf', 100);

        $this->post('/sounds', [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ])->assertSessionHasErrors();

        $this->assertDatabaseMissing('sounds', $sound->toArray());

        $this->deleteFile();
    }

    public function tests_title_is_required()
    {
        $this->signIn();

        $this->get('/sounds/create')
            ->assertStatus(200);

        $sound = factory(Sound::class)->make();
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create('sound.mp3', 100);

        $data =  [
            'title' => null,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ];

        $this->post('/sounds', $data)->assertSessionHasErrors('title');

        $this->deleteFile();
    }
}
