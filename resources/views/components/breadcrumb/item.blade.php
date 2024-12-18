@props([
    'isHead' => false,
    'text' => '',
    'href' => '#',
])
<li class="inline-flex items-center text-dark/70">
    @if (!$isHead)
        <x-lucide-chevron-right class="w-4 h-4" />
    @endif
    <x-link :href="$href" {{ $attributes->twMerge('font-normal') }}>{{ $text }}</x-link>
</li>
