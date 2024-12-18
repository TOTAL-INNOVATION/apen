@props([
	'type' => 'button',
	'size' => 'default',
	'variant' => 'primary',
	'href' => '#',
	'roundedFull' => false,
	'component' => 'button',
	'disabled' => false
])

@php
    $bgColor = match($variant) {
        'secondary' => 'bg-secondary text-white hover:bg-opacity-90',
        'gold' => 'bg-gold text-dark hover:bg-opacity-90',
        'success' => 'bg-success hover:bg-opacity-90',
        'warning' => 'bg-warning text-dark hover:bg-opacity-90',
        'error' => 'bg-error text-white hover:bg-opacity-90',
        'outline' => 'text-dark bg-transparent border border-whisper hover:bg-bright/35',
        'viridian' => 'bg-viridian text-white hover:bg-opacity-90',
        'chocolate' => 'bg-chocolate text-white hover:bg-opacity-90',
        'dark' => 'bg-dark text-white hover:bg-opacity-90',
        default => 'bg-primary text-white hover:bg-opacity-90',
    };

    $sizes = [
        'default' => 'text-base h-10 px-4 py-2',
        'sm' => 'text-sm h-9 px-3',
        'lg' => 'text-base h-11 px-8',
        'icon' => 'h-10 w-10',
    ];

    $classNames = [
        $sizes[$size],
        $bgColor,
        'inline-flex items-center justify-center whitespace-nowrap ring-offset-white transition-colors outline-0 focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-70 transition-colors',
        $roundedFull ? 'rounded-full' : '',
    ];
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
