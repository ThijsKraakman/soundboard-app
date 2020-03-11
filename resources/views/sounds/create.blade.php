@extends('layouts.app')

@section('content')
<div class="bg-white border-2 rounded-lg">
    <div class="px-6 py-6">
    <form method="POST" enctype="multipart/form-data" action="/sounds">
        @csrf
        <div class="field mb-6">
            <label class="label font-bold mb-2 block" for="title">Title</label>
            <div class="control">
                <input type="text" class="input bg-white border border-grey-light rounded p-2 text-xs w-1/4"
                    name="title" required>
            </div>
        </div>

        <div class="field mb-6">
            <label class="label font-bold mb-2 block" for="description">Description</label>
            <div class="control">
                <textarea name="description" rows="10"
                    class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-1/2"></textarea>
            </div>
        </div>

        <div class="field mb-6">
            <input type="file" name="file" />
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Sound</button>
        <a href="/sounds" class="no-underline hover:underline text-blue-500">Cancel</a>

    </form>
</div>
</div>
@endsection
