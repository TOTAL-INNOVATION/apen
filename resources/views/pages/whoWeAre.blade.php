<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('C\'est quoi APEN?') }}</x-slot:title>
		<meta name="description" content="Homepage">
	</x-slot:metadata>

	<main class="py-4 sm:pb-6 md:pb-8 lg:pb-12">
		<div class="px-4 sm:px-0 container">
			<x-breadcrumb>
				<x-breadcrumb.item
					href="{{ route('home') }}"
					text="{{ __('Accueil') }}"
					isHead
				/>
				<x-breadcrumb.item
					href="#"
					text="{!! __('C\'est quoi APEN?') !!}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">{{ __('C\'est quoi APEN?') }}</h2>
				<div class="mt-4 md:mt-6 lg:mt-8">
					<div>
						<img class="w-full object-cover object-center" src="https://placehold.co/600x300" alt="{{ __('Siège de l\'APEN') }}">
					</div>
					<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
						<p>{{ __('L\'APEN est un Etablissement Public de l’Etat à caractère Professionnel (EPEP). Elle est dotée de la personnalité  morale et de l\'autonomie financière. Elle est placée sous la tutelle  technique  du  Ministre   de l\'Industrie, du Commerce et de l\'Artisanat et financière du Ministre de l\'Economie et des Finances.') }}</p>
						
						<p>{{ __('L’A.P.E.N a pour mission d\'assurer l’organisation et la promotion de l\'expertise nationale. Elle est notamment chargée de : ') }}</p>
						
						<ul class="space-y-2">

							<x-custom-list-item>
								{{ __('gérer la stratégie de promotion de l\'expertise nationale; coordonner et superviser toutes les actions relatives à l\'exercice des professions d’expert;') }}
							</x-custom-list-item>

							<x-custom-list-item>
								{{ __('veiller à l\'application des règles d’éthique et de déontologie élaborées à la fois par la société d’expertise et l\'entreprise d\'expertise individuelle;') }}
							</x-custom-list-item>

							<x-custom-list-item>
								{{ __('entreprendre toutes études et recherches en vue  du renforcement de la capacité  opérationnelle  des experts nationaux;') }}
							</x-custom-list-item>

							<x-custom-list-item>
								{{ __('promouvoir une politique de partenariat avec l\'expertise étrangère;') }}
							</x-custom-list-item>

							<x-custom-list-item>
								{{ __('publier les avis de vacances des postes au niveau de la Fonction Publique Internationale et traiter les dossiers de candidatures y relatifs en relation avec les départements ministériels; entreprendre des concertations avec les autorités nationales  et les partenaires techniques et financiers pour tous problèmes relatifs à l\'expertise.') }}
							</x-custom-list-item>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
</x-base-layout>
