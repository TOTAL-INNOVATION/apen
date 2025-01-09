@props([
    'id' => sprintf('_%s', Str::random(8)),
    'name' => sprintf('_%s', Str::random(8)),
    'value' => '',
    'checked' => false
])

<input type="radio" name="{{ $name }}" {{ $attributes->twMerge('shrink-0 mt-0.5 border-whisper rounded-full text-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none') }} value="{{ $value }}" id="{{ $id }}" checked="{{ $checked }}">
