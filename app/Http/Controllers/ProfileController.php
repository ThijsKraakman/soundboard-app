<?php

namespace App\Http\Controllers;

use App\User;
use App\Sound;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $sounds = Sound::where('owner_id', $user->id)->get();

        return view('profiles.show', compact('user', 'sounds'));
    }
}
