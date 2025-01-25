<footer class="pt-4 sm:pt-6 md:pt-8 lg:pt-12 text-white bg-primary">
	<div class="p-4 container">
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
			<div>
				<div class="p-2 w-fit bg-white">
					<x-link href="{{ route('home') }}">
						<img src="{{ asset('logo.png') }}" class="w-16 sm:w-20 md:w-24" alt="{{ config('app.name') }}">
					</x-link>
				</div>
				<x-nav class="mt-4" direction="vertical">
					<x-link href="{{ route('whoWeAre') }}">{{ __('À propos d\'APEN') }}</x-link>
					<x-link href="{{ route('becomeExpert.index') }}">{{ __('Dévenir expert') }}</x-link>
					<x-link href="{{ route('contactExpert.index') }}">{{ __('Contacter un expert') }}</x-link>
					<x-link href="{{ route('announcements') }}">{{ __('Communiqués') }}</x-link>
					<x-link href="{{ route('news.index') }}">{{ __('Actualités') }}</x-link>
					<x-link href="{{ route('contacts') }}">{{ __('Contacts') }}</x-link>
				</x-nav>
			</div>

			<div>
				<h3 class="heading-3 uppercase">{{ __('Liens utiles') }}</h3>
				<x-nav class="mt-2 md:mt-4" direction="vertical">
					<x-link class="inline-flex" href="https://www.presidencedufaso.bf" target="_blank">
						<span>{{ __('La présidence du Faso') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>

					<x-link class="inline-flex" href="https://www.gouvernement.gov.bf" target="_blank">
						<span>{{ __('Le Gouvernement') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>

					<x-link class="inline-flex" href="https://www.assembleenationale.bf" target="_blank">
						<span>{{ __('L\'Assemblée Nationale') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>

					<x-link class="inline-flex" href="https://www.sig.gov.bf" target="_blank">
						<span>{{ __('Le SIG') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>

					<x-link class="inline-flex" href="https://www.pndes.gov.bf" target="_blank">
						<span>{{ __('Le PNDES') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>

					<x-link class="inline-flex" href="https://peb.bf" target="_blank">
						<span>{{ __('Le Portail d\'Entrée au Burkina Faso') }}</span>
						<x-lucide-arrow-up-right class="w-4" />
					</x-link>
				</x-nav>
			</div>

			<div>
				<h3 class="heading-3 uppercase">{{ __('Contacts') }}</h3>
				<div class="mt-2 md:mt-4">
					<div>
						<div class="flex">
							<x-lucide-phone class="w-4" />
							<span class="ml-1 font-franklin-medium">{{ __('Téléphone') }} : </span>
						</div>
						<x-nav class="pl-1 mt-1 md:mt-2" direction="vertical">
							<x-link href="tel:+22625314493">{{ __('+226 25 31 44 93') }}</x-link>
							<x-link href="tel:+22625490088">{{ __('+226 25 49 00 88') }}</x-link>
							<x-link href="tel:+22625490245">{{ __('+226 25 49 02 45') }}</x-link>
						</x-nav>
					</div>

					<div class="mt-2 md:mt-3">
						<div class="flex">
							<x-lucide-map-pin class="w-[18px]" />
							<span class="ml-1 font-franklin-medium">{{ __('Adresse') }} : </span>
						</div>
	
						<div class="pl-1 mt-1 md:mt-2 flex flex-col space-y-2">
							<span>01 BP 514 Ouagadougou 01</span>
							<span>Burkina Faso, Kadiogo</span>
						</div>
					</div>

					<div class="mt-2 md:mt-3">
						<div class="flex">
							<x-lucide-mail class="w-4" />
							<span class="ml-1 font-franklin-medium">{{ __('Email') }} : </span>
							<x-link class="ml-1" href="mailto:infos@commerce.gov.bf">infos@commerce.gov.bf</x-link>
						</div>
					</div>
				</div>
			</div>

			<div>
				<img src="{{ asset('assets/pnud.png') }}" class=" w-20 md:w-24" alt="{{ __('Programme des Nations Unies pour le développement (PNUD)') }}">
				<div class="mt-2 md:mt-4">
					<span>{{ __('Portal réalisé grâce au soutien du ') }}</span>
					<span class="font-franklin-medium">{{ __('Programme des Nations Unies pour le développement (PNUD)') }}</span>
				</div>
			</div>

		</div>
	</div>
	
	<div class="py-4 md:py-6 bg-dark/5">
		<div class="text-center">
			<span>&copy; Copyright</span>
			<span>{{ date('Y') }}</span>
			<span> | APEN – Burkina Faso</span>
			<span></span>
		</div>
	</div>
</footer>
