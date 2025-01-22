@props([
    'variant' => 'vertical', // or 'horizontal'
    'title' => '',
    'description' => '',
    'imageSrc' => null,
    'href' => '#',
    'withoutDescription' => false,
])

@if ($variant === 'vertical')
    <a href="{{ $href }}" class="arrow-move-trigger">
        <x-card class="border-0 flex flex-col">
            <div>
                <img class="w-full" src="{{ $imageSrc ?? asset('defaults/600x400.svg') }}" alt="{{ $title }}">
            </div>
            <div class="p-4 lg:p-6 border border-whisper border-t-0">
                <x-card.title class="uppercase">{{ $title }}</x-card.title>
                @if (!$withoutDescription)
                    <div class="mt-2 sm:mt-4 h-16 md:mt-2 md:h-20 lg:h-16 xl:h-20 lg:mt-4">
                        <p>{{ $description }}</p>
                    </div>
                @endif
                <div class="{{ $withoutDescription ? 'mt-4 sm:mt-6' : '' }}">
                    <span class="inline-flex items-end">
                        <span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
                        <x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
                    </span>
                </div>
            </div>
        </x-card>
    </a>
@else
    <a href="{{ $href }}" class="h-36 lg:h-auto xl:h-1/2 arrow-move-trigger">
        <x-card class="h-full border-0 flex">
            <div class="w-2/5 sm:w-1/2 aspect-video">
                <img class="w-full h-full object-cover" src="{{ $imageSrc ?? asset('defaults/600x400.svg') }}" alt="{{ $title}}">
            </div>
            <div class="w-full p-3 lg:p-6 border border-l-0 border-whisper">
                <x-card.title class="uppercase">{{ $title }}</x-card.title>
                <div class="mt-2 lg:mt-4">
                    @if (!$withoutDescription)
                        <p class="w-16 sm:w-auto">{{ $description }}</p>
                    @endif
                    <div class="mt-1 sm:mt-8 xl:mt-12">
                        <span class="inline-flex items-end">
                            <span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
                            <x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
                        </span>
                    </div>
                </div>
            </div>
        </x-card>
    </a>
@endif
