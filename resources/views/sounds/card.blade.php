
<div class="w-full sm:w-full md:w-1/2 lg:w-1/2 px-6 py-6">
    <div class="overflow-hidden bg-white border-t border-l border-r rounded-t-lg mt-2">
        <div class="px-6 py-6">
            <div class="flex">
                <div class="font-bold text-xl mb-4 w-3/4">{{ $sound->title }}</div>
                <div class="font-bold text-sm ml-5 mt-2 w-1/4">{{ $sound->created_at->diffForHumans() }}</div>
            </div>
            <div class="mb-4">
                <audio controls class="w-full">
                    <source src={{ asset($sound->file) }}>
                </audio>
            </div>
            <p class="text-gray-700 text-base">
                {{ $sound->description }}
            </p>
        </div>
    </div>

    <div class="rounded-b-lg bg-gray-800 h-16 mb-2">
        <div class="flex">
            <div class="flex w-1/2 px-6 py-5">
                <like :sound="{{ $sound }}"></like>
            </div>
            <div class="w-1/2 px-6 py-5">
                <div class="font-bold text-right text-white hover:text-green-400">
                    <a href="/profile/{{ $sound->owner->username }}">{{ $sound->owner->username }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
