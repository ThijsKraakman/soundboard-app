<?php

namespace Tests;

use App\User;
use App\Sound;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();
        $this->actingAs($user);

        return $user;
    }

    protected function createFile($file = null)
    {
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create($file, 100);

        return $file;
    }

    protected function deleteFile($file = null)
    {
        Storage::delete('/sounds/sound.mp3');
        $this->assertFileNotExists('/sounds/sound.mp3');
    }

    public function createSound()
    {
        $sound = factory(Sound::class)->make([
            'file' => 'sounds/sound.mp3',
            'owner_id' => 1]
        );

        $file = $this->createFile('sound.mp3');

        $data =  [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'owner_id' => $sound->owner_id
        ];

        $this->post('/sounds', $data)->assertRedirect('/sounds');
    }
}
