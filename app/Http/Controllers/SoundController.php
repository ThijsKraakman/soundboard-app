<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoundRequest;
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

    // public funcion show()
    // {

    // }

    public function create()
    {
        return view('sounds.create');
    }

    public function store(StoreSoundRequest $request)
    {
        $data = $request->validated();
        $data['owner_id'] = Auth::user()->id;
        $data['file'] = $request->file->store('sounds');

        Sound::create($data);

        return redirect('sounds/');
    }

    // public function edit(Project $project)
    // {

    // }

    // public function update(Sound $p)
    // {

    // }

    // public function destroy(Project $project)
    // {

    // }
}
