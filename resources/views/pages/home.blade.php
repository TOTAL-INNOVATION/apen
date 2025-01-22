<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Page d\'accueil') }}</x-slot:title>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	</x-slot:metadata>
	<main>
		<div class="sm:aspect-video md:aspect-auto md:min-h-[400px] md:h-[calc(100svh-179.617px)] max-w-screen-2xl">
			<div class="h-full overflow-x-hidden news_slides">
				<div class="h-full flex slides_container">

					<x-news-slide
						title="{{ __('Visite au SIAO 2023') }}"
						coverSrc="{{ asset('assets/apen_au_siao.jpeg') }}"
						url="#"
					/>

					<x-news-slide 
						title="{{ __('2è session ordinaire de l’Assemblée Générale des Experts agréés') }}"
						coverSrc="{{ asset('assets/grand_assemblée.jpg') }}"
						url="#"
					/>
					
				</div>
			</div>
		</div>

		<section class="pt-4 sm:pt-6 md:pt-8 lg:pt-12">
			<div class="px-4 sm:px-auto container">
				<div class="grid grid-cols-1 xl:grid-cols-7 gap-4 sm:gap-6">
					<div class="xl:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
						
						<x-priority-card
							title="{{ __('Devenir expert') }}"
							description="{!! __('Conditions, procédure d\'inscription, formulaire de candidature') !!}"
							imageSrc="{{ asset('defaults/600x400.svg') }}"
							href="{{ route('becomeExpert.index') }}"
						/>

						<x-priority-card
							title="{{ __('Placement') }}"
							description="{!! __('Offres d\'emploi, annonces de recrutement') !!}"
							imageSrc="{{ asset('defaults/600x400.svg') }}"
							href="{{ route('announcements') }}"
						/>

					</div>

					<div class="xl:col-span-3 flex flex-col gap-y-4 sm:gap-y-6">
						<x-priority-card
							variant="horizontal"
							title="{{ __('Communiqués') }}"
							description="{{ __('Rubriques communiqués') }}"
							imageSrc="{{ asset('defaults/600x400.svg') }}"
							href="{{ route('releases.index') }}"
						/>

						<x-priority-card
							variant="horizontal"
							title="{{ __('Newsletter') }}"
							description="{!! __('Bulletin d\'informations') !!}"
							imageSrc="{{ asset('defaults/600x400.svg') }}"
							href="{{ route('newsletter.index') }}"
						/>

					</div>
				</div>
				
				
			</div>
		</section>

		<div>
			<div class="py-4 sm:py-6 md:py-8 lg:py-12 px-4 container">
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
					<section class="sm:col-span-2">
						<h2 class="heading-2 uppercase">{{ __('Actualités') }}</h2>
						<div class="mt-2 sm:mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
							<x-news-card
								title="{{ __('Visite au SIAO 2023') }}"
								coverSrc="{{ asset('assets/apen_au_siao.jpeg') }}"
								url="#"
							/>
	
							<x-news-card
								title="{{ __('2è session ordinaire de l’Assemblée Générale des Experts agréés') }}"
								coverSrc="{{ asset('assets/apen_au_siao.jpeg') }}"
								url="#"
							/>
						</div>
						
						<div class="mt-4 md:mt-6">
							<x-button variant="outline" size="lg" component="a" href="#" class="w-full sm:w-auto arrow-move-trigger">
								<span>{{ __('Voir toutes les actualités') }}</span>
								<x-lucide-arrow-right class="w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect" />
							</x-button>
						</div>
					</section>

					<aside class="sm:col-span-2 lg:col-span-1">
						<h2 class="heading-2 uppercase">{{ __('Communiqués') }}</h2>
						<div class="mt-2 sm:mt-4 md:mt-6">
							<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4 sm:gap-6 lg:gap-2 xl:gap-6">
								<x-mini-release 
									title="COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN"
									url="#"
								/>
	
								<x-mini-release 
									title="COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN"
									url="#"
								/>
	
								<x-mini-release 
									title="COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN"
									url="#"
								/>
	
								<x-mini-release 
									title="COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN"
									url="#"
								/>
								
							</div>

							<div class="mt-4 md:mt-6">
								<x-button variant="outline" size="lg" component="a" href="#" class="w-full sm:w-auto arrow-move-trigger">
									<span>{{ __('Voir tous les communiqués') }}</span>
									<x-lucide-arrow-right class="w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect" />
								</x-button>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
		
	</main>
</x-base-layout>
