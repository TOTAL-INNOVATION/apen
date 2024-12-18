<x-app-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('À propos') }}</x-slot:title>
		<meta name="description" content="Homepage">
	</x-slot:metadata>

	<main class="py-4">
		<div class="px-4 sm:px-0 container">
			<x-breadcrumb>
				<x-breadcrumb.item
					path="{{ route('home') }}"
					text="{{ __('Accueil') }}"
					isHead
				/>
				<x-breadcrumb.item
					path="#"
					text="{{ __('À propos') }}"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			
		</div>
	</main>
</x-app-layout>
