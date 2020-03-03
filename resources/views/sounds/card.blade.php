<div class="px-6 py-6">
    <div class="overflow-hidden border-t border-l border-r rounded-t-lg mt-2 ml-2 mr-2">
        <div class="px-6 py-6">
            <div class="font-bold text-xl mb-4">{{ $sound->title }}</div>
            <div class="mb-4">
                <audio controls>
                    <source src={{ asset($sound->file) }}>
                </audio>
            </div>
            <p class="text-gray-700 text-base">
                {{ $sound->description }}
            </p>
        </div>
    </div>

    <div class="rounded-b-lg bg-gray-800 h-16 mb-2 ml-2 mr-2">
        <div class="px-6 py-4">
            <div class="font-bold text-white pb-3 pt-0">{{ $sound->owner->name}}</div>
        </div>
    </div>
</div>
