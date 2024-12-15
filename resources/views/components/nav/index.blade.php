@props([
    /* direction must be either vertical or horizontal */
    'direction' => 'horinzontal',
])

<nav
    {{ $attributes->twMerge(['flex', $direction === 'horinzontal' ? 'space-x-2 py-2' : 'flex-col space-y-2']) }}>
    {{ $slot }}
</nav>
