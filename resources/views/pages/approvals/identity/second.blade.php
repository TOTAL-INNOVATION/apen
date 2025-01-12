@use('App\Enums\GenderEnum')
@use('App\Enums\MaritalStatusEnum')
@php
	$countries = countriesList();
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Identification') }}</x-slot:title>
        <meta name="description" content="Entrez vos informations d'identification pour continuer.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Identification - Partie 2') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Identification - Partie 2') }}</h2>

				<div class="mt-4 md:mt-6">
					<x-form action="#" method="POST">
						
						<x-form.field.select 
							label="{{ __('Pays de résidence') }}" 
							name="country_of_residence" 
							required>
							@foreach ($countries as $country)
								<x-select.option value="{{ $country['name'] }}">{{ $country['name'] }}</x-select.option>
							@endforeach
						</x-form.field.select>

						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                <span>{{ __('Suivant') }}</span>
                                <x-lucide-arrow-right class="w-5 h-5 ml-2" />
                            </x-button>
                        </div>
					</x-form>
				</div>
			</div>
		</div>

	</main>

</x-base-layout>
