@use('App\Enums\GenderEnum')
@use('App\Enums\MaritalStatusEnum')
@use('App\Enums\ApprovalTypeEnum')
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
					<x-form action="{{ route('identity.second') }}" method="POST" enctype="multipart/form-data">
						
						<x-form.field.select 
							label="{{ __('Pays de résidence') }}" 
							name="country_of_residence"
							required>
							@foreach ($countries as $country)
								<option
                                    value="{{ $country['name'] }}"
                                    @selected($approval->country_of_residence===$country['name']||$country['name'] === 'Burkina Faso')
                                    >
                                    <span class="inline-flex items-center">
                                        <span class="mr-2">{{ $country['emoji'] }}</span>
                                        <span>{{ $country['name'] }}</span>
                                    </span>
                                </option>
							@endforeach
						</x-form.field.select>

                        <x-form.field
                            label="{!! __('Photo d\'identité') !!}"
                            type="file"
                            name="identity_photo"
                            accept="image/png, image/jpg, image/jpeg"
                            required
                        />

                        @if($approval->type === ApprovalTypeEnum::CATEGORY_A)
                            <x-form.field
                                label="{{ __('Registre commercial') }}"
                                name="commercial_register"
                                placeholder="{{ __('RCCM ou RSCPM') }}"
                                value="{{ $approval->commercial_register ?? old('commercial_register') }}"
                                required
                            />
                        @endif

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
