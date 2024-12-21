@props([
	'withoutPaddings' => false,
])

<div {{ $attributes->twMerge([
	$withoutPaddings ? '' : 'p-4 sm:p-6',
	'flex justify-between items-center'
	]) }}>
    {{ $slot }}
</div>
