@props([
    'title' => '',
    'url' => '#',
    'published_at' => null,
])

<x-link href="{{ $url }}">
    <x-card class="p-4 hover:bg-whisper/10">
        <div class="h-16 overflow-hidden text-ellipsis">
            <h3 class="text-lg sm:text-xl font-franklin-medium">{{ str($title)->limit(96) }}</h3>
        </div>
        <div class="pt-4 flex items-center justify-between">
            <span class="text-chocolate font-franklin-medium">{{ __('Publié le :date', ['date' => ($published_at ?? now())->format('d/m/Y')]) }}</span>
            <span class="inline-flex items-center space-x-2">
                <span class="font-franklin-medium">{{ __('Lire') }}</span>
                <x-lucide-arrow-right class="w-5 h-5" />
            </span>
        </div>
    </x-card>
</x-link>
