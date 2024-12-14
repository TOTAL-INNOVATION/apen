@props([
    'shadowed' => false,
    'rounded' => false,
])

<div
    {{ $attributes->twMerge([
        'bg-white border border-whisper', 
        $rounded ? 'rounded-xl' : '', 
        $shadowed ? 'shadow-sm' : '',
        ]) }}>
    {{ $slot }}
</div>
