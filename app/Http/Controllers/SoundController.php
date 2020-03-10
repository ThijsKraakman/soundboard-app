<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoundRequest;
use App\Points;
use App\Sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class SoundController extends Controller
{
    public function index()
    {
        $sounds = Sound::all();
        return view('sounds.index', compact('sounds'));
    }

    public function create()
    {
        return view('sounds.create');
    }

    public function store(StoreSoundRequest $request)
    {
        $data = $request->validated();
        $data['owner_id'] = Auth::user()->id;
        $filename = $data['file']->getClientOriginalName();
        $data['file'] = $request->file->storeAs('sounds', $filename);

        Sound::create($data);

        $points = Points::firstOrCreate(['user_id' => Auth::user()->id]);

        $points->awardPoints(Auth::user(), 100);
        $points->save();

        return redirect('sounds/');
    }
}
