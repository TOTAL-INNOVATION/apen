<x-base-layout>
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
					@forelse ($decrees as $decree)
						<x-doc-card
							name="{{ $decree->name }}"
							url="{{ $decree->doc_path }}"
							size="{{ $decree->size }}"
							extension="{{ $decree->type }}"
						/>
					@empty
						<div class="w-full min-h-64 flex flex-col justify-center items-center">
							<div>
								<x-lucide-inbox class="w-14 h-14 stroke-[1.5] stroke-rainee" />
							</div>
							<p class="mt-4 text-lg">{{ __('Aucun document disponible pour le moment') }}</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</main>
</x-base-layout>