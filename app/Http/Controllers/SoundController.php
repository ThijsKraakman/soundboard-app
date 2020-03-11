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
        $sounds = Sound::all()->sortByDesc('created_at');
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

        $soundFilename = $data['file']->getClientOriginalName();

        if (array_key_exists('image', $data)) {
            $imageFilename = $data['image']->getClientOriginalName();
            $data['image'] = $request->image->storeAs('images', $imageFilename);
        } else {
            $imageFilename = 'default.jpg';
            $data['image'] = 'images/' . $imageFilename;
        };

        $data['file'] = $request->file->storeAs('sounds', $soundFilename);

        Sound::create($data);

        $points = Points::firstOrCreate(['user_id' => Auth::user()->id]);

        $points->awardPoints(Auth::user(), 100);
        $points->save();

        return redirect('sounds/');
    }
}
