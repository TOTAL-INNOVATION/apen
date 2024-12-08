@props([
    /* direction must be either vertical or horizontal */
    "direction" => 'horinzontal',
])

<nav {{ $attributes->twMerge([$direction === 'horinzontal' ? 'flex space-x-2 py-2' : 'space-y-2']) }}>
    {{ $slot }}
</nav>
