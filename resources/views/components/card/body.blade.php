@props([
	'withoutPaddings' => false,
])

<div {{ $attributes->twMerge([$withoutPaddings ? '' : 'p-4 lg:p-6']) }}>
    {{ $slot }}
</div>
