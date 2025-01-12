@use('App\Actions\CloneSelectOptions')
@props([
    'size' => 'base',
    'isCustom' => true,
    'placeholder' => 'Sélectionner une option'
])

@php
    
    $sizes = [
        'sm' => 'text-sm',
        'base' => 'text-base',
        'large' => 'text-base',
    ];

    $classNames = [
        'h-10 flex items-center w-full border border-whisper outline-transparent bg-white',
         $sizes[$size],
         'ring-offset-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent focus:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all',
	];
@endphp

<div>
    <select {{ $attributes->twMerge($isCustom ? 'hidden' : $classNames) }}>
        {{ $slot }}
    </select>
    @if ($isCustom)
        <div class="{{ twMerge([$classNames, 'relative']) }}">
            <div id="content" class="absolute top-10 w-full h-[250px] bg-white border border-whisper shadow overflow-y-scroll">
                <div class="w-full relative">
                    {!! CloneSelectOptions::handle($slot->toHtml()) !!}
                </div>
            </div>
            <x-lucide-chevron-down id="chevron" class="w-4 h-4 text-dark/75" />
        </div>
    @endif
</div>
