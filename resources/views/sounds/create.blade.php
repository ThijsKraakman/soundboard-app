@extends('layouts.app')

@section('content')
<div class="w-full px-6 py-4">
    <form method="POST" enctype="multipart/form-data" action="/sounds" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
            <div class="control">
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="title" required>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
            <div class="control">
                <textarea name="description" rows="10"
                    class="textarea shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">Sound file</label>
            <input type="file" name="file" required/>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image file</label>
            <input type="file" name="image" />
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Sound</button>
        <a href="/sounds" class="no-underline hover:underline text-blue-500">Cancel</a>

    </form>
</div>

@endsection
