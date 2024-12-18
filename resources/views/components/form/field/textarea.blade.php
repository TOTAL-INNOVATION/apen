@props([
	'label' => null,
	'id' => sprintf('_%s', Str::random(8)),
	'name' => sprintf('_%s', Str::random(8)),
	'labelHidden' => false,
])

<div class="mb-2 sm:mb-4">
    @if ($label)
        <x-form.label :for="$id" :hidden="$labelHidden">
            {{ $label }}
        </x-form.label>
    @endif
    <x-textarea {{ $attributes }}  :id="$id" :name="$name" {{ $attributes }}>{{ old($name) }}</x-textarea>
    @error($name)
    <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>
