<x-app-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Textes réglementaires') }}</x-slot:title>
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
					text="{!! __('Textes réglementaires') !!}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">{{ __('Décrets en documents téléchargeables') }}</h2>

				<div class="mt-4 md:mt-6 lg:mt-8 flex flex-col space-y-4">
					<x-doc-card
						name="Décret 2013-226 portant droits et obligations d’agréments"
						url="#"
						size="5.4"
						extension="pdf"
					/>

					<x-doc-card
						name="Décret 2013-226 portant droits et obligations d’agréments"
						url="#"
						size="5.4"
						extension="pdf"
					/>

					<x-doc-card
						name="Décret 2013-226 portant droits et obligations d’agréments"
						url="#"
						size="5.4"
						extension="pdf"
					/>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>