@use('App\Actions\CloneSelectOptions')
@props([
    'size' => 'base',
    'placeholder' => 'Sélectionner une option',
    'isCustom' => true,
    'searchable' => false,
    'class' => '',
    'disabled' => false,
])

@php

    $sizes = [
        'sm' => 'text-sm',
        'base' => 'text-base',
        'large' => 'text-base',
    ];

    $classNames = [
        'h-10 flex items-center w-full border border-whisper outline-transparent bg-white hover:bg-white',
        $sizes[$size],
        'ring-offset-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent focus:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all',
        $class,
    ];
@endphp

<div class="select-root">
    <select {{ $attributes->twMerge($isCustom ? 'hidden' : $classNames) }} @disabled($disabled)
        @if ($isCustom) data-custom-select @endif>
        {{ $slot }}
    </select>
    @if ($isCustom)
        <div class="relative">
            <x-button variant="outline" class="{{ twMerge([$classNames, 'justify-between']) }}" :disabled="$disabled" data-trigger>
                <span data-placeholder="{{ $placeholder }}">{{ $placeholder }}</span>
                <x-lucide-chevron-down id="chevron" class="w-4 h-4 text-dark/75" />
            </x-button>
            <div class="hidden absolute top-12 w-full h-fit bg-white border border-whisper shadow z-10 focus:outline-primary" aria-hidden="true"
                data-content>
                @if ($searchable)
                        <div class="p-1 w-full bg-white border-b border-whisper">
                            <x-input type="text" placeholder="Rechercher..." class="h-8" />
                        </div>
                    @endif

                <div class="w-full h-[200px] overflow-y-scroll">
                    <ul class="w-full scroll-smooth">

                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
