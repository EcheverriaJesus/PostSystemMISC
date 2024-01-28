<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-semibold text-gray-800 lg:text-3xl lg:w-96">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
