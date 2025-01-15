@use('App\Enums\ApprovalTypeEnum')
@use('App\Enums\ExpertStatusEnum')

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
                <x-breadcrumb.item href="#" text="{{ __('Identification - Partie 3') }}"
                    class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Identification - Partie 3') }}</h2>

                <div class="mt-4 md:mt-6">
                    <x-form action="{{ route('identity.third') }}" method="POST">

                        <x-form.field label="{!! __('Association (si membre)') !!}" name="association"
                            placeholder="{!! __('Nom d\'une association') !!}" />

                        @if ($approval->type !== ApprovalTypeEnum::CATEGORY_C)
                            <div class="mb-4">
                                <x-form.label>
                                    {{ __('Nombre de domaines') }}
                                </x-form.label>
                                <div
                                    class="{{ twMerge(['grid', $approval->type === ApprovalTypeEnum::CATEGORY_A ? 'grid-cols-3' : 'grid-cols-2', 'gap-4']) }}">
                                    @for ($i = 1; $i <= ApprovalTypeEnum::maxDomains($approval->type); $i++)
                                        <x-select-box name="total_sectors" :label="$i===1?'1 domaine':__(':i domaines',['i'=>$i])" :value="$i"
                                            :checked="$i === $approval->total_sectors" class="sm:w-5 sm:h-5" />
                                    @endfor
                                </div>

                                @error('marital_status')
                                    <p class="text-error mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

						<div class="mb-4">
							<x-form.label>
								{!! __('Satut de l\'expert') !!}
							</x-form.label>
							<div class="grid grid-cols-2 gap-4">

								@foreach (ExpertStatusEnum::cases() as $key => $status)
								<x-select-box
									name="expert_status"
									:label="$status->value"
									:value="$status->value"
									class="sm:w-5 sm:h-5"
									:checked="$approval->expert_status===$status||$key===0"
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
