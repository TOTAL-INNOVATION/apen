@props([
    'size' => 'sm',
])

@php

    $overlaySizes = [
        'sm' => 'sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)]',
        'md' => 'md:max-w-2xl md:w-full m-3 md:mx-auto',
        'lg' => 'lg:max-w-4xl lg:w-full m-3 lg:mx-auto',
    ];

    $overlayClass = twMerge([
        'hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all', $overlaySizes[$size], 'flex items-center']);

@endphp

<div
    class="hs-overlay hidden size-full fixed top-0 start-0 overflow-x-hidden overflow-y-auto pointer-events-none bg-dark/25 z-[1100]"
    id="modal" {{ $attributes }}>
    <div class="{{ $overlayClass }}">
        <div class="w-full flex flex-col bg-white shadow-sm rounded-none pointer-events-auto">
            {{ $slot }}
        </div>
    </div>
</div>
