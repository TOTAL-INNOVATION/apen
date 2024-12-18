@props([
    'iconClassName' => ''
])

<li {{ $attributes->twMerge('inline-flex font-franklin-medium') }}>
    <span class="w-8">
        <x-lucide-arrow-right class="{{ twMerge('w-5 md:w-6 mt-1 mr-2 stroke-2', $iconClassName) }}" />
    </span>
    <span>{{ $slot }}</span>
</li>
