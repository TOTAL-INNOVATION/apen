@props([
    'title' => '',
    'description' => '',
    'coverSrc' => '#',
    'url' => '#',
])

<div class="min-h-64 sm:h-full bg-cover bg-center slide" style="background-image: url({{ $coverSrc }})">
    <div class="w-full h-full bg-dark/60">
        <div class="h-full px-4 sm:px-auto container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
            <div>
                <a href="{{ $url }}" class="flex flex-col arrow-move-trigger">
                    <div class="text-3xl md:text-4xl lg:text-5xl text-white font-texta-black uppercase">{{ Str::limit($title, 40) }}</div>
                    <div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
                        <span>
                            {{ Str::limit($description, 150) }}
                        </span>
                        <span class="inline-flex items-end">
                            <span class=" font-franklin-medium">{{ __('Lire') }}</span>
                            <x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
