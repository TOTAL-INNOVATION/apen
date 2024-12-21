@props([
    'title' => '',
    'url' => '#',
    'published_at' => now(),
])

<x-link href="{{ $url }}">
    <x-card class="p-2 sm:p-4 text-sm">
        <div class="text-chocolate">
            <span>{{ __('Du') }}</span>
            <span>{{ $published_at->format('d/m/Y') }}</span>
        </div>
        <div class="mt-2">
           <span>{{Str::limit($title, 85)}}</span>
           <span class="inline-flex items-center">
                <span>{{ __('. Lire') }}</span>
                <x-lucide-arrow-right class="w-4 ml-1 transition-all md:arrow-move-effect" />
           </span>
        </div>
    </x-card>
</x-link>