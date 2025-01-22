<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Communiqués') }}</x-slot:title>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	</x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Communiqués') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>
		
		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-xl mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Les communiqués disponibles') }}</h2>

                <div class="mt-6 md:mt-8 space-y-4">
					@forelse ($statements as $statement)
						<x-release
							title="{{ $statement->title }}"
							url="{{ route('releases.show', $statement->slug) }}"
							published_at="{{ $statement->published_at }}"
						/>
					@empty
						<div class="sm:col-span-2 lg:col-span-3 min-h-64 flex flex-col justify-center items-center">
							<div>
								<x-lucide-inbox class="w-14 h-14 stroke-[1.5] stroke-rainee" />
							</div>
							<p class="mt-4 text-lg">{{ __('Aucun communiqué disponible pour le moment') }}</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>

	</main>
</x-base-layout>
