<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Toutes les actualités') }}</x-slot:title>
		<meta name="description" content="Homepage">
	</x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
		<div class="px-4 sm:px-0 container">
			<x-breadcrumb>
				<x-breadcrumb.item
					href="{{ route('home') }}"
					text="{{ __('Accueil') }}"
					isHead
				/>
				<x-breadcrumb.item
					href="#"
					text="{{ __('Actualités') }}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<h2 class="heading-2 uppercase">{{ __('Toutes les actualités') }}</h2>

			<div class="mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
				@for ($i = 0; $i < 6; $i++)
					<x-news-card
						title="{{ __('Visite au SIAO 2023') }}"
						description="{{ __('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.') }}"
						coverSrc="{{ asset('assets/apen_au_siao.jpeg') }}"
						url="#"
					/>
				@endfor
			</div>

			<div class="pt-6">
				<div class="flex gap-x-2 sm:gap-x-4">
					<x-button variant="outline" component="a" href="#" class="sm:text-base">
						<x-lucide-move-left class="w-4" />
						<span class="ml-1">{{ __('Précédent') }}</span>
					</x-button>

					<span class="size-10 inline-flex items-center justify-center text-sm sm:text-base font-franklin-medium border border-whisper">1</span>

					<x-button variant="outline" component="a" href="#" class="sm:text-base">
						<span class="mr-1">{{ __('Suivant') }}</span>
						<x-lucide-move-right class="w-4" />
					</x-button>
				</div>
			</div>
		</div>
	</main>
</x-base-layout>