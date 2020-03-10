<?php

namespace App\Http\Controllers;

use App\Sound;
use App\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Sound $sound)
    {
        $sound->like();

        $points = Points::firstOrCreate(['user_id' => $sound->owner->id]);

        $points->awardPoints($sound->owner, 100);
        $points->save();

        return back();
    }
}
