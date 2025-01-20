@php
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    $certificates = $approval->certificates;
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Certificats/Attestations') }}</x-slot:title>
        <meta name="description" content="Entrez les différents certificats ou attestations en votre possession, si vous en avez.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Certificats/Attestations') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Certificats/Attestations') }}</h2>

                @if (!$certificates->count())
                    <div class="mt-4 md:mt-6">
                        <p class="mb-2 block font-franklin-medium">{{ __('Avez-vous des Certificats/Attestations de formation?') }}</p>
                        <div class="space-y-2">
                            <p class="flex items-center space-x-2">
                                <x-radio
                                    id="yes"
                                    name="has-certificate"
                                    class="w-5 h-5"
                                    value="yes"
                                    :checked="true"
                                />
                                <x-form.label class="text-lg font-franklin-regular font-medium mb-0" for="yes">{{ __('Oui') }}</x-form.label>
                            </p>
                            <p class="flex items-center space-x-2">
                                <x-radio
                                    id="no"
                                    name="has-certificate"
                                    class="w-5 h-5"
                                    value="no"
                                />
                                <x-form.label class="text-lg font-franklin-regular font-medium mb-0" for="no">{{ __('Non') }}</x-form.label>
                            </p>
                        </div>
                    </div>
                @endif

                <div class="mt-4 md:mt-6" id="certificates-zone">
                    <div class="p-2 bg-whisper/50 border border-rainee/25">
                        <span class="font-franklin-medium">{{ __('Note: ') }}</span>
                        <span class="text-[15px]">{{ __('Enrégistez les certificat ou attestations de chaque formation à laquelle vous avez pris part.') }}</span>
                    </div>
    
                    @session('success')
                        <x-alert class="mt-4 sm:mt-6" variant="success">{{ __($value) }}</x-alert>
                    @endsession
                </div>
			</div>
        </div>

	</main>
</x-base-layout>
