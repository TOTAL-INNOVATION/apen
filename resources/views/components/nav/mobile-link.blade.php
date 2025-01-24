@php
    $isActive = $href === url()->current();
@endphp

<x-link {{ $attributes->twMerge(['w-full relative px-4 py-2.5 text-nowrap uppercase inline-flex justify-between items-center cursor-pointer outline-none hover:bg-whisper/35', $isActive ? 'bg-whisper/40' : '']) }}>
	{{ $slot }}
</x-link>
