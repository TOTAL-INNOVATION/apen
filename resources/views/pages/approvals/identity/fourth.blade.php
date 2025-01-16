@use('App\Enums\ActivitySectorEnum')
@use('App\Enums\StatusInSectorEnum')

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
                <x-breadcrumb.item href="#" text="{{ __('Identification - Partie 4') }}"
                    class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Identification - Partie 4') }}</h2>

                <div class="mt-4 md:mt-6">
                    <x-form action="{{ route('identity.fourth') }}" method="POST">
                        <x-form.field.select label="{!! __('Structure d\'activité') !!}" name="activity_sector" required>
                            @foreach (ActivitySectorEnum::cases() as $key => $sector)
                                <option value="{{ $sector->value }}" @selected($sector === $approval->activity_sector || $key === 0)>
                                    {{ $sector->value }}
                                </option>
                            @endforeach
                        </x-form.field.select>

                        <x-form.field.select label="{{ __('Position dans la structure') }}" name="status_in_sector"
                            required>
                            @foreach (StatusInSectorEnum::cases() as $key => $status)
                                <option value="{{ $status->value }}" @selected($status === $approval->status_in_sector || $key === 0)>
                                    {{ $status->value }}
                                </option>
                            @endforeach
                        </x-form.field.select>

                        <div class="mb-4">
                            <x-form.label>
                                {{ __('Catégorie professionnel') }}
                            </x-form.label>
                            <div class="space-y-4">
                                @foreach (['A', 'B', 'C'] as $category)
                                    <x-select-box name="category" label="{{ __('Catégorie :c', ['c' => $category]) }}"
                                        :value="$category" class="sm:w-5 sm:h-5" :checked="$approval->category === $category || $key === 0" />
                                @endforeach
                            </div>
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
