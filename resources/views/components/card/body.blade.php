@props([
	'withoutPaddings' => false,
])

<div {{ $attributes->twMerge([$withoutPaddings ? '' : 'p-4 sm:p-6']) }}>
    {{ $slot }}
</div>
