@props([
    'href' => '#',
])

@php
    $isActive = $href === url()->current() || str($href)->startsWith(path());
@endphp

<x-link
    :href="$href"
    {{ $attributes->twMerge([
		'relative px-4 py-2.5 text-nowrap inline-flex  justify-center items-center cursor-pointer after:absolute after:left-0 after:bottom-0 after:h-[2px] after:bg-primary after:transition-all',
		$isActive ? 'after:w-full font-franklin-medium text-primary' : 'hover:after:navlink-hover-effect',
	]) }}
    >
    {{ $slot }}
</x-link>
