@extends('layouts.app')

@section('content')
@csrf
<form method="POST" enctype="multipart/form-data" action="/sounds">
    {{ csrf_field() }}
<div class="field mb-6">


    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input
                type="text"
                class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                name="title"
                placeholder="My next awesome project"
                required>
    </div>
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="description">Description</label>

    <div class="control">
            <textarea
                name="description"
                rows="10"
                class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                placeholder="I should start learning piano."
                ></textarea>
    </div>
</div>

<div class="control">
    <input type="file" name="file" />
</div>

        <button type="submit" class="btn">Add sound</button>

        {{-- <a href="{{ $sound->path() }}">Cancel</a> --}}

</form>
@endsection
