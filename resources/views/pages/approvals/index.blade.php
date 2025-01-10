@use('App\Enums\ApprovalTypeEnum')

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Sélection de catégorie') }}</x-slot:title>
        <meta name="description" content="Sélectionnez la catégorie d'agrément pour laquelle vous souhaitez candidater.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{!! __('Choix d\'agrément') !!}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Sélectionner une catégorie') }}</h2>

                <div class="mt-4 md:mt-6">
                    <p>{{ __('Pour commencer, cliquez sur l\'un des choix suivants pour sélectionner la catégorie d\'agrément pour laquelle vous souhaiteriez candidater:') }}</p>
                </div>

                <div class="mt-4 md:mt-6">
                    @session('success')
                        <x-alert class="mb-4 sm:mb-6" variant="success">{{ __($value) }}</x-alert>
                    @endsession

                    @session('error')
                        <x-alert class="mb-4 sm:mb-6" variant="error">{{ __($value) }}</x-alert>
                    @endsession

                    <x-form method="POST">

                        <div class="space-y-4">
                            @foreach (ApprovalTypeEnum::values() as $approval)
                                <x-select-box label="{{ $approval }}"
                                    description="{{ __('Agrément de :value', ['value' => $approval]) }}" name="type"
                                    value="{{ $approval }}" />
                            @endforeach
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
