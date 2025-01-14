@props([
    'label' => null,
    'id' => sprintf('_%s', Str::random(8)),
    'name' => sprintf('_%s', Str::random(8)),
    'labelHidden' => false,
    'required' => false,
])

<div {{ $attributes->twMerge('mb-4') }} data-image-field>
    @if ($label)
        <x-form.label :for="$id" :hidden="$labelHidden">
            {{ $label }}
        </x-form.label>
    @endif

    <div class="p-4 w-full min-h-[250px] border border-dashed border-rainee" data-root>
        <div class="mx-auto w-[250px] aspect-square bg-white border border-whisper" data-preview>
            
        </div>
    </div>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden" required="{{ $required }}">
    @error($name)
        <p class="text-error mt-2">{{ $message }}</p>
    @enderror
</div>
