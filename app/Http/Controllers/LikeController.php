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

        return back();
    }
}
