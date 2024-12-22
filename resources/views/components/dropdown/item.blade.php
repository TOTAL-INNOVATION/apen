@props([
    "type" => "button",
    "component" => "a",
    "size" => "sm",
    "widthFull" => true,
	"roundedFull" => false,
	"disabled" => false,
	"href" => "#"
])

<x-button :type="$type" variant="outline" :size="$size" :widthFull="$widthFull" :roundedFull="$roundedFull" :disabled="$disabled" :component="$component" :href="$href" {{ $attributes->twMerge('text-base justify-start border-0 gap-x-1 hover:bg-whisper') }}>
    {{ $slot }}
</x-button>
