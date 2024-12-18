@props([
    'withoutCsrf' => false
])

<form {{ $attributes }}>
	@if(!$withoutCsrf)
        @csrf
	@endif
    {{ $slot }}
</form>
