@use('App\Enums\DegreeLevelEnum')

@php
	$degree = $approval->degree;
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Diplômes') }}</x-slot:title>
        <meta name="description" content="Entrez les informations sur votre diplôme le plus élévé.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Diplôme') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Diplôme') }}</h2>
                
				<div class="mt-4 md:mt-6">
                    <x-form method="POST" action="{{ route('approval.degrees') }}" enctype="multipart/form-data">
						<x-form.field.select
							name="level"
							label="{{ __('Diplôme le plus élévé') }}"
							required
						>
							@foreach (DegreeLevelEnum::cases() as $key => $level)
								<option
									value="{{ $level->value }}"
									@selected($level->value===$degree?->level||$key===0)
								>{{ $level->value }}</option>
							@endforeach
						</x-form.field.select>

						<x-form.field
							name="level_precision"
							label="{{ __('Précisez le niveau') }}"
							placeholder="{{ __('BAC+N (N=1,2,3,...). Ex: BAC+7 en élevage') }}"
							value="{{ $degree?->level_precision ?? old('level_precision') }}"
							required
						/>

						<x-form.field
							type="date"
							name="started_at"
							label="{{ __('Date de début') }}"
							value="{{ $degree?->started_at ?? old('started_at') }}"
							required
						/>

						<x-form.field
							type="number"
							name="years_of_experience"
							label="{{ __('Nombre d’années de pratique professionnelle') }}"
							placeholder="{{ __('Entrez un nombre') }}"
							value="{{ $degree?->years_of_experience ?? old('years_of_experience') }}"
							required
						/>

						<x-form.field
                            label="{{ __('Joindre le diplôme (Format pdf)') }}"
                            type="file"
                            name="file"
                            accept="application/pdf"
                            required
                        />
						
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
