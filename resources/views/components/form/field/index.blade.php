@props([
	'label' => null,
	'type' => 'text',
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
	<x-input :type="$type" :id="$id" :name="$name" value="{{ old($name) }}" {{ $attributes }} />
    @error($name)
        <p class="text-error mt-2">{{ $message }}</p>
    @enderror
</div>
