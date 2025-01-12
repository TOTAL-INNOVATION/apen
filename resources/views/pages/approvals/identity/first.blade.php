@use('App\Enums\GenderEnum')
@use('App\Enums\MaritalStatusEnum')
@php
	$user = user();
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
                <x-breadcrumb.item href="#" text="{{ __('Identification - Partie 1') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Identification - Partie 1') }}</h2>

				<div class="mt-4 md:mt-6">
					<x-form action="{{ route('identity.first') }}" method="POST">
						<x-form.field
							name="birthday"
							label="{{ __('Date de naissance') }}"
							type="date"
							value="{{ $user->birthday ?? old('birthday') }}"
							required
						/>

						<x-form.field
							name="birthplace"
							label="{{ __('Lieu de naissance') }}"
							placeholder="{{ __('Ville, Pays') }}"
							value="{{ $user->birthplace ?? old('birthplace') }}"
							required
						/>

						<div class="mb-4">
							<x-form.label>
								{{ __('Genre') }}
							</x-form.label>
							<div class="grid grid-cols-2 gap-x-4">

								@foreach (GenderEnum::cases() as $key => $gender)
									<x-select-box
										name="gender"
										:label="$gender->value"
										:value="$gender->value"
										class="sm:w-5 sm:h-5"
										:checked="$user->gender===$gender||$key===0"
									/>
								@endforeach

							</div>

							@error('gender')
								<p class="text-error mt-2">{{ $message }}</p>
							@enderror
						</div>

						<div class="mb-4">
							<x-form.label>
								{{ __('Situation matrimonial') }}
							</x-form.label>
							<div class="grid grid-cols-2 gap-4">

								@foreach (MaritalStatusEnum::cases() as $key => $status)
								<x-select-box
									name="marital_status"
									:label="$status->value"
									:value="$status->value"
									class="sm:w-5 sm:h-5"
									:checked="$user->marital_status===$status||$key===0"
								/>
								@endforeach

							</div>

							@error('marital_status')
								<p class="text-error mt-2">{{ $message }}</p>
							@enderror
						</div>

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
