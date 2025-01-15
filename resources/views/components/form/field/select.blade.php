@props([
	'label' => null,
	'id' => sprintf('_%s', Str::random(8)),
	'name' => sprintf('_%s', Str::random(8)),
	'containerClass' => '',
	'labelHidden' => false,
])

<div class="{{ twMerge($containerClass, 'mb-4') }}">
	@if ($label)
		<x-form.label :for="$id" :hidden="$labelHidden">
			{{ $label }}
		</x-form.label>
	@endif
	<x-select name="{{ $name }}" {{ $attributes }} data-select>
		{{ $slot }}
	</x-select>
    @error($name)
        <p class="text-error mt-2">{{ $message }}</p>
    @enderror
</div>
