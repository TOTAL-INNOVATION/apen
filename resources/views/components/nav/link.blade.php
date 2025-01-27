@props([
    'href' => '#',
    'widthFull' => false,
    'rounded' => false,
])

@php
    $isActive = $href === url()->current();
@endphp

<x-link
    :href="$href"
    {{ $attributes->twMerge([
    $widthFull ? 'w-full' : 'w-fit',
    'px-4 py-2.5 text-nowrap inline-flex justify-center items-center cursor-pointer hover:bg-whisper/75 transition-colors',
    $rounded ? 'rounded-lg' : '',
     $isActive ? 'text-primary font-franklin-medium bg-whisper/50 hover:bg-whisper/50' : ''
    ]) }}
    >
    {{ $slot }}
</x-link>
