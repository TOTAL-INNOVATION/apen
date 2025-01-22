<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>{{ __('Newsletter') }}</x-slot:title>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	</x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Newsletter') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Souscrire au newsletter') }}</h2>

				@session('success')
					<x-alert class="mt-4 sm:mt-6" variant="success">{{ __($value) }}</x-alert>
				@endsession

                <div class="mt-4 md:mt-6">
					<x-form action="{{ route('newsletter.subscribe') }}" method="POST">
						<x-form.field
							label="Votre email"
							name="email"
							placeholder="{{ __('Ex: exemple@gmail.com') }}"
							required
						/>

						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                {{ __('Souscrire') }}
                            </x-button>
                        </div>
					</x-form>
				</div>
			</div>
		</div>

	</main>
</x-base-layout>
