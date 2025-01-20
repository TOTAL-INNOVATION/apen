@props([
    'name',
    'level',
    
    'procuredAt',
    'trainer'
])

<div class="grid grid-cols-2 p-4 bg-whisper/30 border border-rainee/25">
    <p>
        <span class="font-franklin-medium uppercase">{{ __('Nom: ') }}</span>
        <span>{{ $name }}</span>
    </p>
    <p>
        <span class="font-franklin-medium uppercase">{{ __('Niveau: ') }}</span>
        <span>{{ $level }}</span>
    </p>
    <p>
        <span class="font-franklin-medium uppercase">{!! __('Annéé d\'obtention: ') !!}</span>
        <span>{{ $procuredAt }}</span>
    </p>
</div>
