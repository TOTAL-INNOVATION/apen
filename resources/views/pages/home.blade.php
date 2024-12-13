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
								<div class="h-full px-2 container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
									<div>
										<a href="#" class="flex flex-col new_slide_link">
											<div class="text-3xl md:text-4xl lg:text-5xl text-white font-texta-black uppercase">{{ Str::limit('Visite au SIAO 2023', 40) }}</div>
											<div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
												<span>
													{{ Str::limit('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.', 150) }}
												</span>
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">Lire</span>
													<x-lucide-move-right class="w-6 ml-2 transition-all md:new_slide_read_more" />
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
								<div class="h-full px-2 container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
									<div>
										<a href="#" class="flex flex-col new_slide_link">
											<div class="text-3xl md:text-4xl lg:text-5xl text-white font-texta-black uppercase">{{ Str::limit('2è session ordinaire de l’Assemblée Générale des Experts agréés', 35) }}</div>
											<div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
												<span>
													{{ Str::limit('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.', 150) }}
												</span>
												<span class="inline-flex items-end">
													<span class=" font-franklin-medium">Lire</span>
													<x-lucide-move-right class="w-6 ml-2 transition-all md:new_slide_read_more" />
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
		</main>
	</div>
</x-app-layout>
