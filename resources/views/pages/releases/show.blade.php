<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ $statement->title }}</x-slot:title>
		<meta name="description" content="{{ $statement->title }}">
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
					href="{{ route('releases.index') }}"
					text="{{ __('Communiqués') }}"
				/>
				<x-breadcrumb.item
					href="#"
					text="{{ str($statement->title)->lower()->ucFirst()->limit(20) }}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">{{ $statement->title }}</h2>
				<div class="mt-4 md:mt-6 lg:mt-8 article">
					<div class="space-y-4 sm:text-lg xl:text-xl">
						{!! Str::markdown($statement->content) !!}
					</div>
				</div>
			</div>
		</div>

	</main>
</x-base-layout>
