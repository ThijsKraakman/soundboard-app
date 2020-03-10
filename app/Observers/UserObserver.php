<?php

namespace App\Observers;

use App\User;
use App\Points;

class UserObserver
{
    public function created(User $user)
    {
        Points::create([
            'user_id' => $user->id
        ]);
    }
}
