@use('App\Enums\DomainTypeEnum')
@php
	$countries = countriesList();
@endphp

<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Contacter un expert') }}</x-slot:title>
        <meta name="description" content="Remplissez le formulaire pour procéder à la demande.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Contacter un expert') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Contacter un expert') }}</h2>

				<div class="mt-4 md:mt-6">

					@session('success')
						<x-alert class="mb-4 sm:mb-6" variant="success">{{ __($value) }}</x-alert>
					@endsession

					<x-form action="{{ route('contactExpert.submit') }}" method="POST">

						<x-form.field
							name="structure"
							label="{{ __('Structure') }}"
							placeholder="Entrez le nom de votre structure"
							required
						/>

						<x-form.field.select 
							label="{{ __('Adresse géographique') }}" 
							name="geographic_region"
							data-observer-name="country"
							required>
							@foreach ($countries as $country)
								<option
									value="{{ $country['name'] }}"
									data-calling-code="{{ $country['callingCode'] }}"
									@selected($country['name'] === 'Burkina Faso')
								>
									<span class="inline-flex items-center">
										<span class="mr-2">{{ $country['emoji'] }}</span>
										<span>{{ $country['name'] }}</span>
									</span>
								</option>
							@endforeach
						</x-form.field.select>

						<x-form.field
							name="address"
							label="{{ __('Préciser votre adresse') }}"
							placeholder="Ex: Ouagadougou, Burkina Faso"
							required
						/>

						<div class="mb-4">
							<x-form.label for="tel">{{ __('Téléphone fix (Optionel)') }}</x-form.label>
							<div class="flex items-center">
								<x-form.field.select
									name="tel-code"
									label="{{ __('Indicatif') }}"
									class="border-r-0 focus:border-whisper focus:ring-transparent"
									containerClass="mb-0"
									:isCustom="false"
									labelHidden
								>
									@foreach ($countries as $country)
										@if ($country['callingCode'])
											<option value="{{ $country['callingCode'] }}" @selected($country['callingCode']==='226')>
												<span class="mr-2">{{ $country['emoji'] }}</span>
												<span>+ {{ $country['callingCode'] }}</span>
											</option>
										@endif
									@endforeach
								</x-form.field.select>

								<x-input type="tel" id="tel" name="tel" placeholder="x x x x x x x x" />
							</div>
							@error('tel')
								<p class="text-error mt-2">{{ $message }}</p>
							@enderror
						</div>
						
						<div class="mb-4">
							<x-form.label for="mobile">{{ __('Téléphone mobile') }}</x-form.label>
							<div class="flex items-center">
								<x-form.field.select
									name="mobile-code"
									label="{{ __('Indicatif') }}"
									class="border-r-0 focus:border-whisper focus:ring-transparent"
									containerClass="mb-0"
									:isCustom="false"
									labelHidden
								>
									@foreach ($countries as $country)
										@if ($country['callingCode'])
											<option value="{{ $country['callingCode'] }}" @selected($country['callingCode']==='226')>
												<span class="mr-2">{{ $country['emoji'] }}</span>
												<span>+ {{ $country['callingCode'] }}</span>
											</option>
										@endif
									@endforeach
								</x-form.field.select>

								<x-input type="tel" id="mobile" name="mobile" placeholder="x x x x x x x x" required />
							</div>
							@error('mobile')
								<p class="text-error mt-2">{{ $message }}</p>
							@enderror
						</div>

						<x-form.field.select
							name="expert_domain"
							label="{!! __('Sélectionner le domaine de l\'expert') !!}"
							required>
							@foreach (DomainTypeEnum::values() as $domain)
								<option value="{{ $domain }}">{{ $domain }}</option>
							@endforeach
						</x-form.field.select>

						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                {{ __('Soumettre la recherche') }}
                            </x-button>
                        </div>
					</x-form>

				</div>

			</div>
		</div>
	</main>
</x-base-layout>
