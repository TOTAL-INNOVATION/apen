<div {{ $attributes->twMerge('flex justify-between items-center py-3 px-4 border-b border-whisper') }}>
    {{ $slot }}
    <button type="button" class="flex justify-center items-center size-8 text-sm font-semibold rounded-full text-gray-800 hover:bg-bright/35 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#modal">
        <span class="sr-only">Close</span>
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
        </svg>
    </button>
</div>
