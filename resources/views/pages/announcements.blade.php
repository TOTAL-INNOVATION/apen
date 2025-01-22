<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Placement') }}</x-slot:title>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	</x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Placement') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="w-full min-h-64 flex flex-col justify-center items-center">
			<div>
				<x-lucide-inbox class="w-14 h-14 stroke-[1.5] stroke-rainee" />
			</div>
			<p class="mt-4 text-lg">{{ __('Aucune annonce disponible pour le moment') }}</p>
		</div>
	</main>
</x-base-layout>
