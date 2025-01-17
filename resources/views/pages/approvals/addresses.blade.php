@php
	$countries = countriesList();
    $regions = regionsOfBurkinaFaso();
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
                <x-breadcrumb.item href="#" text="{{ __('Adresses') }}" class="font-franklin-medium" />
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
                            data-observer-name="country"
							required>
							@foreach ($countries as $country)
								<option
                                    value="{{ $country['name'] }}"
                                    data-calling-code="{{ $country['callingCode'] }}"
                                    @selected($country['name'] === 'Burkina Faso')>
                                    <span class="inline-flex items-center">
                                        <span class="mr-2">{{ $country['emoji'] }}</span>
                                        <span>{{ $country['name'] }}</span>
                                    </span>
                                </option>
							@endforeach
						</x-form.field.select>

                        <div data-subscribe="country" data-show-when="Burkina Faso">
                            <x-form.field.select
                                label="{{ __('Région') }}"
                                name="region"
                                data-observer-name="region"
                            >
                                @foreach ($regions as $region => $provinces)
                                    <option value="{{ $region }}" data-provinces="{{ json_encode($provinces) }}">
                                        {{ $region }}
                                    </option>
                                @endforeach
                            </x-form.field.select>

                            <x-form.field.select
                                label="{{ __('Province') }}"
                                name="province"
                                data-subscribe="region"
                                data-set-attr-as-options="data-provinces"
                                :isCustom="false"
                            ></x-form.field.select>

                        </div>

                        <div
                            data-subscribe="country"
                            data-hide-when="Burkina Faso"
                            class="hidden"
                        >
                            <x-form.field
                                name="address"
                                label="{{ __('Adresse') }}"
                                placeholder="Ex: Thiès, Régions de Thiès(pour Sénégal)"
                            />
                        </div>

                        <x-form.field
                            name="mailbox"
                            label="{{ __('Boîte postale (Optionel)') }}"
                            placeholder="Entrez votre boite postale"
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

                                <x-input type="tel" id="mobile" name="mobile" placeholder="x x x x x x x x" />
                            </div>
                            @error('mobile')
                                <p class="text-error mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-form.field
                            label="{{ __('URL de votre site web (Optionel)') }}"
                            type="url"
                            name="website"
                            placeholder="Ex: exemple.com"
                        />

                        <x-form.field
                            label="{{ __('Fax (Optionel)') }}"
                            name="fax"
                            placeholder="Entrez votre fax"
                        />

                        <div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" component="a" href="#" widthFull>
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
