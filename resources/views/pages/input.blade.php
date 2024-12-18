@props([
    'type' => 'text',
    'name' => '',
    'size' => 'base',
    'placeholder' => '',
])


@php
    $sizes = [
        'sm' => 'py-2 px-3 text-sm',
        'base' => 'py-3 px-4 text-sm',
        'large' => 'p-4 sm:p-4.5 text-base',
    ];

    $classNames = [
        'flex h-10 w-full border border-whisper outline-transparent bg-white',
         $sizes[$size],
         'ring-offset-white file:border-0 file:bg-transparent file:text-sm file:font-franklin-medium placeholder:text-rainee focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-transparent focus-visible:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all',
	];
@endphp

<input
    type="{{ $type }}"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->twMerge($classNames) }}
/>
