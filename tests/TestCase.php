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

    protected function createSoundFile($file = null)
    {
        Storage::fake('sounds');
        $file = UploadedFile::fake()->create($file, 100);

        return $file;
    }

    protected function createImage($file = null)
    {
        Storage::fake('images');
        $file = UploadedFile::fake()->create($file, 100);

        return $file;
    }

    protected function deleteSoundFile($file = null)
    {
        Storage::delete('/sounds/sound.mp3');
        $this->assertFileNotExists('/sounds/sound.mp3');
    }

    protected function deleteImageFile($file = null)
    {
        Storage::delete('/images/image.jpg');
        $this->assertFileNotExists('/images/image.jpg');
    }

    public function createSound()
    {
        $sound = factory(Sound::class)->make([
            'file' => 'sounds/sound.mp3',
            'owner_id' => 1]
        );

        $file = $this->createSoundFile('sound.mp3');
        $image = $this->createImage('file.jpg');

        $data =  [
            'title' => $sound->title,
            'description' => $sound->description,
            'file' => $file,
            'image' => $image,
            'owner_id' => $sound->owner_id
        ];

        $this->post('/sounds', $data)->assertRedirect('/sounds');
    }
}
