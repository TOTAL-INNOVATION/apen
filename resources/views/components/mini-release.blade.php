@props([
    'title' => '',
    'url' => '#',
])

<x-link href="{{ $url }}" class="py-2 border-b border-whisper">
    <x-card class="max-w-full bg-transparent border-0 font-semibold hover:bg-whisper/10">
        {{ Str::limit($title, 105) }}
    </x-card>
</x-link>
