<x-app-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Page d\'accueil') }}</x-slot:title>
		<meta name="description" content="Homepage">
	</x-slot:metadata>
	<div>
		<x-header />
		<main class=" text-dark">
			<div class="aspect-video md:aspect-auto md:min-h-[400px] md:h-[calc(100svh-179.617px)] max-w-screen-2xl">
				<div class="h-full overflow-x-hidden news_slides">
					<div class="h-full flex slides_container">

						{{-- FIRST --}}
						<div class="h-full bg-cover bg-center slide" style="background-image: url({{ asset('assets/apen_au_siao.jpeg') }})">
							<div class="w-full h-full bg-dark/60">
								<div class="h-full px-4 sm:px-auto container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
									<div>
										<a href="#" class="flex flex-col new_slide_link">
											<div class="text-3xl md:text-4xl lg:text-5xl text-white font-texta-black uppercase">{{ Str::limit('Visite au SIAO 2023', 40) }}</div>
											<div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
												<span>
													{{ Str::limit('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.', 150) }}
												</span>
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">{{ __('Lire') }}</span>
													<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
												</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>

						{{-- FIRST END --}}

						{{-- SECOND --}}

						<div class="h-full bg-cover bg-center slide" style="background-image: url({{ asset('assets/grand_assemblée.jpg') }})">
							<div class="w-full h-full bg-dark/60">
								<div class="h-full px-4 sm:px-auto container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
									<div>
										<a href="#" class="flex flex-col new_slide_link">
											<div class="heading-1 text-white uppercase">{{ Str::limit('2è session ordinaire de l’Assemblée Générale des Experts agréés', 35) }}</div>
											<div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
												<span>
													{{ Str::limit('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.', 150) }}
												</span>
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">{{ __('Lire') }}</span>
													<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
												</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>

						{{-- SECOND END --}}
					</div>
				</div>
			</div>

			<section class="pt-4 sm:pt-6 md:pt-8 lg:pt-12">
				<div class="px-4 sm:px-auto container">
					<div class="grid grid-cols-1 xl:grid-cols-7 gap-4 sm:gap-6">
						<div class="xl:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
							<a href="#" class="priority_block">
								<x-card class="border-0 flex flex-col">
									<div>
										<img class="w-full" src="https://placehold.co/600x400" alt="{{ __('Devenir expert') }}">
									</div>
									<div class="p-4 lg:p-6 border border-whisper border-t-0">
										<x-card.title class="uppercase">{{ __('Devenir expert') }}</x-card.title>
										<div class="mt-2 sm:mt-4 h-16 md:mt-2 md:h-20 lg:h-16 xl:h-20 lg:mt-4">
											<p>{{ __('Conditions, procédure d\'inscription, formulaire de candidature') }}</p>
										</div>
										<div>
											<span class="inline-flex items-end">
												<span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
												<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
											</span>
										</div>
									</div>
								</x-card>
							</a>
	
							<a href="#" class="priority_block">
								<x-card class="border-0 flex flex-col">
									<div>
										<img class="w-full" src="https://placehold.co/600x400" alt="{{ __('Placement') }}">
									</div>
									<div class="p-4 lg:p-6 border border-whisper border-t-0">
										<x-card.title class="uppercase">{{ __('Placements') }}</x-card.title>
										<div class="mt-2 sm:mt-4 h-16 md:mt-2 md:h-20 lg:h-16 xl:h-20 lg:mt-4">
											<p>{{ __('Offres d\'emploi, annonces de recrutement') }}</p>
										</div>
										<div>
											<span class="inline-flex items-end">
												<span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
												<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
											</span>
										</div>
									</div>
								</x-card>
							</a>
						</div>

						<div class="xl:col-span-3 flex flex-col gap-y-4 sm:gap-y-6">
							<a href="#" class="h-36 lg:h-auto xl:h-1/2 priority_block">
								<x-card class="h-full border-0 flex">
									<div class="w-2/5 sm:w-1/2 aspect-video">
										<img class="w-full h-full object-cover" src="https://placehold.co/600x400" alt="{{ __('Newsletter') }}">
									</div>
									<div class="w-full p-3 lg:p-6 border border-l-0 border-whisper">
										<x-card.title class="uppercase">{{ __('Communiqués') }}</x-card.title>
										<div class="mt-2 lg:mt-4">
											<p class="w-16 sm:w-auto">{{ __('Rubriques communiqués') }}</p>
											<div class="mt-1 sm:mt-8 xl:mt-12">
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
													<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
												</span>
											</div>
										</div>
									</div>
								</x-card>
							</a>

							<a href="#" class="h-36 lg:h-auto xl:h-1/2 priority_block">
								<x-card class="h-full border-0 flex">
									<div class="w-2/5 sm:w-1/2 aspect-video">
										<img class="w-full h-full object-cover" src="https://placehold.co/600x400" alt="{{ __('Newsletter') }}">
									</div>
									<div class="w-full p-3 lg:p-6 border border-l-0 border-whisper">
										<x-card.title class="uppercase">{{ __('Newsletter') }}</x-card.title>
										<div class="mt-2 lg:mt-4">
											<p class="w-16 sm:w-auto">{{ __('Bulletin d\'informations') }}</p>
											<div class="mt-1 sm:mt-8 xl:mt-12">
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">{{ __('Voir plus') }}</span>
													<x-lucide-arrow-right class="w-6 ml-1 transition-all md:arrow-move-effect" />
												</span>
											</div>
										</div>
									</div>
								</x-card>
							</a>

						</div>
					</div>
					
					
				</div>
			</section>

			<section class="pt-4 sm:pt-6 md:pt-8 lg:pt-12">
				<div class="px-2 container">
					<h2 class="heading-2 uppercase">{{ __('Actualités') }}</h2>
					<div class="pt-4 sm:pt-6 md:pt-8 lg:pt-12 grid grid-cols-1">

					</div>
				</div>
			</section>
			
		</main>
	</div>
</x-app-layout>
