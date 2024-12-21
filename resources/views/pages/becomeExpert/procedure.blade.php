<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Procédure d\'inscription') }}</x-slot:title>
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
					href="{{ route('becomeExpert.index') }}"
					text="{{ __('Devenir expert') }}"
				/>
				<x-breadcrumb.item
					href="#"
					text="{!! __('Procédure d\'inscription') !!}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">{{ __('Procédure d\'inscription') }}</h2>

				<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
					<p>{{ __('Pour candidater pour l\'acquisition d\'un agrément d\'expert, vous devez:') }}</p>
					
					<ul class="inline-flex flex-col space-y-2">
						<x-custom-list-item class="cursor-pointer">
							<x-link href="#" class="inline-flex items-center gap-x-1 text-primary underline underline-offset-4" target="__blank">
								<span>{{ __('Créer un compte') }}</span>
								<x-lucide-arrow-up-right class="w-5" />
							</x-link>
						</x-custom-list-item>

						<x-custom-list-item class="cursor-pointer">
							<x-link href="#" class="inline-flex items-center gap-x-1 text-primary underline underline-offset-4" target="__blank">
								<span>{{ __('Remplir le formulaire  de l\'agrément d’expert demandé') }}</span>
								<x-lucide-arrow-up-right class="w-5" />
							</x-link>
						</x-custom-list-item>

						<x-custom-list-item class="font-franklin-regular">
							<span class="font-franklin-medium">{{ __('Payer les frais de dossier') }}</span><br />
							<span>{{ __('Les frais de dossiers de demande d’Agrément Catégorie A, B et C non remboursables s’élèvent à Quinze milles (15.200) franc CFA.') }}</span><br>
							<span>{{ __('Pour payer les frais de dossier de candidatures, deux options de paiement sont mises à votre disposition. La première option concerne les paiements par Orange Money et Moov Money. La deuxième option est le payement classique par virement bancaire sur le compte de l’APEN.') }}</span>
						</x-custom-list-item>
					</ul>
				</div>
			</div>
		</div>
	</main>
</x-base-layout>
