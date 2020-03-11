<div class="w-full sm:w-full md:w-1/2 lg:w-1/3 px-6 py-3">
    <div class="rounded-t-lg bg-gray-800 h-16 mt-2">
        <div class="px-6 py-5">
            <div class="flex">
                <div class="font-bold text-white text-xl mb-4 w-3/4">{{ $sound->title }}</div>
            </div>
        </div>
    </div>
    <div class="overflow-hidden bg-white h-40"
        style="background-image: url('{{asset($sound->image)}}'); background-size: cover;">

    </div>
    <div class="bg-gray-800 h-16">
        <div class="px-4 py-4">
            <div class="mb-4">
                <audio controls class="w-full">
                    <source src={{ asset($sound->file) }}>
                </audio>
            </div>
        </div>
    </div>
    <div class="rounded-b-lg bg-gray-800 h-16 mb-2">
        <div class="flex">
            <div class="flex w-1/2 px-6 py-6">
                <like :sound="{{ $sound }}"></like>
            </div>
            <div class="w-1/2 px-6 py-6">
                <div class="font-bold text-right text-white hover:text-green-400">
                    <a href="/profile/{{ $sound->owner->username }}">{{ $sound->owner->username }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
