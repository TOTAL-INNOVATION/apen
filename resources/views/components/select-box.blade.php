@props([
    'label' => '',
    'description' => null,
    'id' => sprintf('_%s', Str::random(8)),
    'name' => sprintf('_%s', Str::random(8)),
    'value' => '',
    'checked' => false,
])
<label for="{{ $id }}" class="p-2 relative flex items-start bg-white border border-whisper cursor-pointer">
    <div class="flex items-center h-5 mt-1">
      <x-radio :id="$id" :name="$name" :value="$value" :checked="$checked" class="w-5 h-5 sm:w-6 sm:h-6 bg-whisper/50 border-2 border-rainee" />
    </div>
    <span class="ms-3">
      <span class="block font-franklin-medium text-dark">{{ $label }}</span>
      @if ($description)
          <span id="apen-select-box-description" class="block text-dark/60">{{ $description }}</span>
      @endif
    </span>
  </label>
