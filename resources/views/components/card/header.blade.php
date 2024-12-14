@props([
	'withoutPaddings' => false,
])

<div {{ $attributes->twMerge([
	!$withoutPaddings ? '' : 'p-2 sm:p-4 md:p-6',
	'flex justify-between items-center'
	]) }}>
    {{ $slot }}
</div>
