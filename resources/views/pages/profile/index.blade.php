<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Profil') }}</x-slot:title>
        <meta name="description" content="Mon profil">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Profil') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 sm:px-0 container">
            
        </div>

	</main>
</x-base-layout>
