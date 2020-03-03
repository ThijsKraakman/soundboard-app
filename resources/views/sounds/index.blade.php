@extends('layouts.app')

@section('content')

<header class="flex items-center mb-3 py-4">
    <div class="px-6 py-4">
    <div class="flex justify-between items-end w-full">
        <a href="/sounds/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Sound</a>
    </div>
</header>

<div class="flex flex-wrap">
@foreach($sounds as $sound)
@include('sounds.card')
@endforeach
</div>
@endsection
