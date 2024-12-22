@props([
    'id' => Str::random(10),
	'variant' => 'primary',
	'close' => true
])

@php
	$variants = [
		'primary' => 'bg-primary/5 border border-primary/35 text-primary',
		'secondary' => 'bg-secondary/5 border border-secondary/35 text-secondary',
		'gold' => 'bg-gold/5 border border-gold/35 text-gold',
		'success' => 'bg-success/5 border border-success/35 text-success',
		'warning' => 'bg-warning/5 border border-warning/35 text-warning',
		'error' => 'bg-error/5 border border-error/35 text-error',
 	];
@endphp

<div id="{{ $id }}" {{ $attributes->twMerge('p-2 w-full flex justify-between gap-x-21', $variants[$variant]) }} role="alert">
	<div>{{ $slot }}</div>
    @if ($close)
        <button class="bg-transparent border-transparent" data-hs-remove-element="#{{ $id }}">
            <x-lucide-x class="w-4 h-4" />
        </button>
    @endif
</div>
