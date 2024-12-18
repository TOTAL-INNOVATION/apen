@props([
	'for' => '',
	'hidden' => false,
])

<label for="{{ $for }}" {{ $attributes->twMerge(['mb-2 block font-franklin-medium cursor-pointer', $hidden ? 'sr-only' : '']) }}>
	{{ $slot }}
</label>
