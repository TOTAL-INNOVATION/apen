@props([
    'url' => '#',
    'name' => '',
    'size' => '',
    'extension' => 'pdf',
])

<x-link :href="$url" title="{{ $name }}" download>
    <x-card class="hover:bg-primary/5">
        <x-card.body class="lg:p-4">
            <x-card.title class="text-lg sm:text-xl lg:text-2xl font-franklin-medium">{{ $name }}</x-card.title>
        </x-card.body>
        <x-card.footer class="lg:p-4 justify-between">
            <div>
                <span class="uppercase">{{ $extension }}</span> - {{ $size }} Mo
            </div>
            <div>
                <x-lucide-download class="w-6" />
            </div>
        </x-card.footer>
    </x-card>
</x-link>
