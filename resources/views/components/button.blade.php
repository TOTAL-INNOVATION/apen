{{-- Possible variants are: primary, secondary, middle, success, warning, error & outline --}}
@props([
	'type' => 'button',
	'size' => 'default',
	'variant' => 'primary',
	'href' => '#',
    'roundedFull' => true,
	'component' => 'button',
	'disabled' => false
])

@php
    $bgColor = match($variant) {
        'outline' => 'bg-transparent hover:bg-gray/90 border-gray',
        default => "bg-$variant hover:bg-$variant/90",
    };

    $sizes = [
        'default' => 'h-10 px-3 sm:px-4 py-2 rounded-md',
        'sm' => 'h-8 px-2 sm:h-9 sm:px-2.5 gap-x-1 sm:gap-x-2',
        'lg' => 'h-11 rounded-md px-8',
    ];

    $textColor = match ($variant) {
        'warning', 'info', 'outline' => 'text-dark',
         default => 'text-white'
    };

    $classNames = twMerge([
        $sizes[$size],
        $size === 'lg' ? 'text-base' : 'text-sm',
        'sm' === $size ? 'font-medium' : 'font-semibold',
        'gap-2',
        $bgColor,
        $textColor,
        'inline-flex items-center justify-center whitespace-nowrap ring-offset-white transition-colors outline-0 focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 transition-colors'
    ]);
@endphp

<{{ $component }}
@if ('a' === $component)
    href='{{ $href }}'
@else
    type='{{ $type }}'
@endif
{{ $attributes->twMerge($classNames) }}
@disabled($disabled)>
{{ $slot }}
</{{ $component }}>
