@php
	$countries = countriesList();
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Adresses') }}</x-slot:title>
        <meta name="description" content="Entrez vos différents adresses.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Adresses') }}"
                    class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Adresses') }}</h2>

				<div class="mt-4 md:mt-6">
					<x-form action="#" method="POST">
						
						<x-form.field.select 
							label="{{ __('Adresse géographique') }}" 
							name="geographic_region"
							required>
							@foreach ($countries as $country)
								<option value="{{ $country['name'] }}" @selected($country['name'] === 'Burkina Faso')>
                                    <span class="inline-flex items-center">
                                        <span class="mr-2">{{ $country['emoji'] }}</span>
                                        <span>{{ $country['name'] }}</span>
                                    </span>
                                </option>
							@endforeach
						</x-form.field.select>

						

					</x-form>
				</div>
			</div>
		</div>

	</main>
</x-base-layout>
