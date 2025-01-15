@props([
	'label' => null,
	'id' => sprintf('_%s', Str::random(8)),
	'name' => sprintf('_%s', Str::random(8)),
	'labelHidden' => false,
])
<div class="mb-4">
    @if ($label)
        <x-form.label :for="$id" :hidden="$labelHidden">
            {{ $label }}
        </x-form.label>
    @endif

    <input type="file" name="{{ $name }}" id="{{ $id }}" {{ $attributes->twMerge('file:mt-2 px-4 h-10 w-full border border-whisper outline-transparent bg-white ring-offset-white file:font-franklin-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-transparent focus-visible:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all') }}>

    @error($name)
        <p class="text-error mt-2">{{ $message }}</p>
    @enderror
</div>
