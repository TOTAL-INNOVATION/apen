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

                        @if ($approval->type === ApprovalTypeEnum::CATEGORY_B)
                            <x-form.field name="commercial_register" label="{{ __('RCCM (Optionnel)') }}"
                                placeholder="Entrez votre RCCM si disponible"
                                value="{{ $approval->commercial_register }}" />
                            <x-form.field name="single_tax_form" label="{{ __('RCCM (Optionnel)') }}"
                                placeholder="Entrez votre RCCM si disponible"
                                value="{{ $approval->single_tax_form }}" />
                        @endif

                        <div class="mb-4">
                            <x-form.label>
                                {!! __('Satut de l\'expert') !!}
                            </x-form.label>

                            @if ($approval->type === ApprovalTypeEnum::CATEGORY_B)
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    @foreach (ExpertStatusEnum::cases() as $key => $status)
                                        <x-select-box name="expert_status"
                                            description="{{ $key === 0 ? __('Travail à son propre compte') : __('Ou attaché(e) à un Bureau') }}"
                                            :label="$status->value" :value="$status->value" class="sm:w-5 sm:h-5"
                                            :checked="$approval->expert_status === $status || $key === 0" />
                                    @endforeach
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach (ExpertStatusEnum::cases() as $key => $status)
                                        @if ($key === 0)
                                            <x-select-box
                                                name="expert_status"
                                                label="{{ __('Indépendant(e)') }}"
                                                :value="$status->value"
                                                class="sm:w-5 sm:h-5"
                                                :checked="$approval->expert_status === $status || $key === 0"
                                            />
                                        @else
                                            <x-select-box
                                                name="expert_status"
                                                label="{!! __('Associé(e) à un bureau d\'Études') !!}"
                                                :value="$status->value"
                                                class="sm:w-5 sm:h-5"
                                                :checked="$approval->expert_status === $status || $key === 0"
                                            />
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @error('expert_status')
                                <p class="text-error mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($approval->type === ApprovalTypeEnum::CATEGORY_B)
                            <div class="mb-4">
                                <p class="mb-2 block font-franklin-medium">{{ __('Avez-vous été agent public de l’Etat ?') }}</p>

                                <div class="space-y-2">
                                    <p class="flex items-center space-x-2">
                                        <x-radio
                                            id="yes"
                                            name="has_been_public_agent"
                                            class="w-5 h-5"
                                            value="1"
                                            :checked="true"
                                        />
                                        <x-form.label class="font-franklin-regular font-medium mb-0" for="yes">{{ __('Oui') }}</x-form.label>
                                    </p>
                                    <p class="flex items-center space-x-2">
                                        <x-radio
                                            id="no"
                                            name="has_been_public_agent"
                                            class="w-5 h-5"
                                            value="0"
                                        />
                                        <x-form.label class="font-franklin-regular font-medium mb-0" for="no">{{ __('Non') }}</x-form.label>
                                    </p>
                                </div>
                            </div>
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
