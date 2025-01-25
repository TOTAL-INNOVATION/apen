@php
	$totalArticles = $articles->count();
	$totalStatements = $statements->count();
	$bottomArticles = $totalStatements ? $articles->take(2) : $articles;
@endphp

<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Page d\'accueil') }}</x-slot:title>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	</x-slot:metadata>
	<main>
		@if ($articles->count())
			<div class="sm:aspect-video md:aspect-auto md:min-h-[400px] md:h-[calc(100svh-179.617px)] max-w-screen-2xl">
				<div class="h-full overflow-x-hidden news_slides">
					<div class="h-full flex slides_container">

						@foreach ($articles as $article)
							<x-news-slide
								title="{{ $article->title }}"
								coverSrc="{{ asset($article->cover) }}"
								url="{{ route('news.show', $article->slug) }}"
							/>
						@endforeach
						
					</div>
				</div>
			</div>
		@endif

		<section class="pt-4 sm:pt-6 md:pt-8 lg:pt-12">
			<div class="px-4 sm:px-auto container">
				<div class="grid grid-cols-1 xl:grid-cols-7 gap-4 sm:gap-6">
					<div class="xl:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
						
						<x-priority-card
							title="{{ __('Devenir expert') }}"
							description="{!! __('Conditions, procédure d\'inscription, formulaire de candidature') !!}"
							imageSrc="{{ asset('assets/devenir_expert.png') }}"
							href="{{ route('becomeExpert.index') }}"
						/>

						<x-priority-card
							title="{{ __('Placement') }}"
							description="{!! __('Offres d\'emploi, annonces de recrutement') !!}"
							imageSrc="{{ asset('assets/placement.png') }}"
							href="{{ route('announcements') }}"
						/>

					</div>

					<div class="xl:col-span-3 flex flex-col gap-y-4 sm:gap-y-6">
						<x-priority-card
							variant="horizontal"
							title="{{ __('Communiqués') }}"
							description="{{ __('Rubriques communiqués') }}"
							imageSrc="{{ asset('assets/communiques.png') }}"
							href="{{ route('releases.index') }}"
						/>

						<x-priority-card
							variant="horizontal"
							title="{{ __('Newsletter') }}"
							description="{!! __('Bulletin d\'informations') !!}"
							imageSrc="{{ asset('assets/newsletters.png') }}"
							href="{{ route('newsletter.index') }}"
						/>

					</div>
				</div>
				
				
			</div>
		</section>

		<div>
			<div class="py-4 sm:py-6 md:py-8 lg:py-12 px-4 container">
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
					<section class="{{ $totalStatements ? 'sm:col-span-2' : 'sm:col-span-3' }}">
						<h2 class="heading-2 uppercase">{{ __('Actualités') }}</h2>
						<div class="mt-2 sm:mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
							@forelse ($bottomArticles as $article)
								<x-news-card
									title="{{ $article->title }}"
									coverSrc="{{ $article->cover }}"
									url="{{ route('news.show', $article->slug) }}"
									published_at="{{ $article->published_at }}"
								/>
							@empty
								<div class="sm:col-span-2 lg:col-span-3 min-h-64 flex flex-col justify-center items-center">
									<div>
										<x-lucide-inbox class="w-14 h-14 stroke-[1.5] stroke-rainee" />
									</div>
									<p class="mt-4 text-lg">{{ __('Aucun article disponible pour le moment') }}</p>
								</div>
							@endforelse
						</div>
						
						@if ($totalArticles)
							<div class="mt-4 md:mt-6">
								<x-button variant="outline" size="lg" component="a" href="#" class="w-full sm:w-auto font-semibold arrow-move-trigger">
									<span>{{ __('Voir toutes les actualités') }}</span>
									<x-lucide-arrow-right class="w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect" />
								</x-button>
							</div>
						@endif
					</section>

					@if ($statements->count())
						<aside class="sm:col-span-2 lg:col-span-1">
							<h2 class="heading-2 uppercase">{{ __('Communiqués') }}</h2>
							<div class="mt-2 sm:mt-4 md:mt-6">
								<div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-4 lg:grid-cols-1">
									@foreach ($statements as $statement)
										<x-mini-release 
											title="{{ $statement->title }}"
											url="{{ route('releases.show', $statement->slug) }}"
										/>
									@endforeach
								</div>

								<div class="mt-4 md:mt-6">
									<x-button variant="outline" size="lg" component="a" href="#" class="w-full sm:w-auto arrow-move-trigger">
										<span>{{ __('Voir tous les communiqués') }}</span>
										<x-lucide-arrow-right class="w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect" />
									</x-button>
								</div>
							</div>
						</aside>
					@endif
				</div>
			</div>
		</div>
		
	</main>
</x-base-layout>
