@props([
	'divided' => true,
	'divider' => 'both', // 'horizontal', 'both'
])

@php
	$classNames = '';
	if ($divided) {
		$classNames .= match($divider) {
			'vertical' => ' divide-y',
			'horizontal' => ' divide-x',
			default => ' divide-x divide-y',
		};
	}

	$classNames .= ' divide-whisper';
@endphp

<tr {{ $attributes->twMerge($classNames) }}>
    {{ $slot }}
</tr>
