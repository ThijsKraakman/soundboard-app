@extends('layouts.app')

@section('content')
@csrf
<form method="POST" enctype="multipart/form-data" action="/sounds">
    {{ csrf_field() }}
    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="title">Title</label>
        <div class="control">
            <input type="text" class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                name="title" required>
        </div>
    </div>

    <div class="field mb-6">
        <label class="label text-sm mb-2 block" for="description">Description</label>
        <div class="control">
            <textarea name="description" rows="10"
                class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"></textarea>
        </div>
    </div>

    <div class="field mb-6">
        <input type="file" name="file" />
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Sound</button>
    <a href="/sounds" class="no-underline hover:underline text-blue-500">Cancel</a>

</form>
@endsection
