<?php

namespace Tests;

use App\User;
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
        $file = UploadedFile::fake()->create('sound.mp3', 100);

        return $file;
    }

    protected function deleteFile($file = null)
    {
        Storage::delete('/sounds/sound.mp3');
        $this->assertFileNotExists('/sounds/sound.mp3');
    }
}
