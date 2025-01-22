@use('App\Enums\DomainTypeEnum')

@php
	$domain = $approval->getCurrentDomain();
	$exceptTypes = $approval
	->domains
	->filter(
		fn($sector) => $sector->id !== $domain?->id
	)
	->map(
		fn($sector) => $sector->type
	)->toArray();
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Domaines et sous domaines') }}</x-slot:title>
        <meta name="description" content="Choisissez vos domaines et sous domaines">
    </x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Domaines et sous domaines') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Domaine n°1') }}</h2>

				<div class="mt-4 md:mt-6">
					<x-form action="{{ route('domains.save') }}" method="POST">
						<x-form.field.select
							name="type"
							label="{{ __('Sélectionner un domaine') }}"
							data-observer-name="type"
							required
						>
							@foreach (DomainTypeEnum::filteredCases($exceptTypes) as $sector)
								<option
									value="{{ $sector->value }}"
									data-sub-domaines="{{ json_encode(DomainTypeEnum::subDomains($sector)) }}"
									@selected($domain?->type===$sector)
								>
									{{ $sector->value }}
								</option>
							@endforeach
						</x-form.field.select>

						<x-form.field.select
							label="{{ __('Premier sous-domaine') }}"
							name="first_subdomain"
							data-subscribe="type"
							data-set-attr-as-options="data-sub-domaines"
							:isCustom="false"
						></x-form.field.select>

						<x-form.field.select
							label="{{ __('Deuxième sous-domaine') }}"
							name="second_subdomain"
							data-subscribe="type"
							data-set-attr-as-options="data-sub-domaines"
							data-has-empty-option
							:isCustom="false"
						></x-form.field.select>

						<x-form.field.select
							label="{{ __('Troisième sous-domaine') }}"
							name="third_subdomain"
							data-subscribe="type"
							data-set-attr-as-options="data-sub-domaines"
							data-has-empty-option
							:isCustom="false"
						></x-form.field.select>

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
