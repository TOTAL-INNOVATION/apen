<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ $article->title }}</x-slot:title>
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
					href="{{ route('news.index') }}"
					text="{{ __('Actualités') }}"
				/>
				<x-breadcrumb.item
					href="#"
					text="{{ Str::limit($article->title, 32) }}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">{{ $article->title }}</h2>
				<div class="mt-4 md:mt-6 lg:mt-8 article">
					<div class="w-full aspect-video overflow-hidden">
						<img class="w-full object-cover object-center" src="{{ asset($article->cover) }}" alt="{{ $article->title }}">
					</div>
					<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
						{!! Str::markdown($article->content) !!}
					</div>
				</div>
			</div>
		</div>

	</main>
</x-base-layout>
