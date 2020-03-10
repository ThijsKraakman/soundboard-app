@extends('layouts.app')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full px-6 py-6">
        <div class="bg-white border-2 rounded-lg">
            <div class="px-6 py-6">
                <p class="text-3xl">{{ $user->username }}</p>
                <p class="text-lg mb-6">Points: {{ $user->getPoints() }}</p>
                <hr>
                <p class="text-3xl mt-6">Achievements</p>
                <p class="text-lg">Achievements here</p>
            </div>
        </div>
    </div>
    <div class="w-full px-6 pt-6">
    <p class="text-3xl">{{ $user->username }}'s sounds</p>
</div>
    @foreach($sounds as $sound)
    @include('sounds.card')
    @endforeach
</div>

@endsection
