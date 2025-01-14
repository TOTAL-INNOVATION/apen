@props([
    'label' => null,
    'id' => sprintf('_%s', Str::random(8)),
    'name' => sprintf('_%s', Str::random(8)),
    'labelHidden' => false,
    'required' => false,
])

<div {{ $attributes->twMerge('mb-4') }}>
    {{ $slot}}
</div>
