@use('App\Enums\LegalStatusEnum')

@php
    $society = $approval->society;
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Société') }}</x-slot:title>
        <meta name="description" content="Entrez les informations de votre société pour continuer.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Société') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Information de la société') }}</h2>

                <div class="mt-4 md:mt-6">
                    <x-form method="POST" action="#">

                        <x-form.field
                            name="name"
                            label="{{ __('Nom de la société') }}"
                            placeholder="{{ __('Entrez le nom de la socité') }}"
                            value="{{ $society?->name }}"
                            required
                        />

                        <x-form.field
                            name="commercial_name"
                            label="{{ __('Nom commercial') }}"
                            placeholder="{{ __('Entrez le nom commercial') }}"
                            value="{{ $society?->commercial_name }}"
                            required
                        />

                        <x-form.field
                            type="date"
                            name="founded_at"
                            label="{{ __('Année de constitution') }}"
                            value="{{ $society?->founded_at }}"
                            required
                        />

                        <x-form.field
                            type="number"
                            name="capital"
                            label="{{ __('Capital de la société') }}"
                            placeholder="{{ __('Entrez une somme') }}"
                            value="{{ $society?->capital }}"
                            required
                        />

                        <x-form.field.select name="legal_status" label="{{ __('Forme juridique') }}">
                            @foreach (LegalStatusEnum::cases() as $key => $status)
                                <option value="{{ $status->value }}"
                                    @selected($society?->legal_status === $status->value || $key === 0)
                                >
                                    {{ $status->value }}
                                </option>
                            @endforeach
                        </x-form.field.select>

                        <x-form.field
                            label="{{ __('Statut de la société') }}"
                            type="file"
                            name="status_file"
                            accept="pdf, doc, docx"
                            required
                        />

                        <x-form.field
                            type="number"
                            name="staff_number"
                            label="{{ __('Total du personnel') }}"
                            placeholder="{{ __('Entrez un nombre') }}"
                            value="{{ $society?->staff_number }}"
                            required
                        />

                        <x-form.field
                            type="number"
                            name="salaried_technical_staff"
                            label="{{ __('Personel cadre technique salarié') }}"
                            placeholder="{{ __('Entrez un nombre') }}"
                            value="{{ $society?->salaried_technical_staff }}"
                            required
                        />

                        <x-form.field
                            type="number"
                            name="salaried_administrative_staff"
                            label="{{ __('Personnel administratif salarié') }}"
                            placeholder="{{ __('Entrez un nombre') }}"
                            value="{{ $society?->salaried_administrative_staff }}"
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
