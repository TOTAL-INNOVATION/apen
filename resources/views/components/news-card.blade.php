
<x-card class="border-0 flex flex-col">
    <div class="aspect-video">
        <img class="w-full h-full object-cover" src="{{ $coverSrc }}" alt="{{ $title }}">
    </div>
    <x-card.body class="border border-whisper border-y-0">
        <div class="mb-2 md:mb-4 text-sm text-chocolate">
            <span>{{ __('Publié le') }}</span>
            <span>{{ ($published_at ?? now())->format('d/m/Y') }}</span>
        </div>
        
        <div class="h-10 text-ellipsis">
            <x-card.title class="lg:text-2xl uppercase">{{ Str::limit($title, 45) }}</x-card.title>
        </div>

    </x-card.body>
    <x-card.footer class="border border-whisper border-t-0">
        <a href="{{ $url }}" class="inline-flex items-end arrow-move-trigger">
            <span class=" font-franklin-medium">{{ __('Lire l\'article') }}</span>
            <x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
        </a>
    </x-card.footer>
</x-card>
