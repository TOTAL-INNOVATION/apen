@use('App\Enums\ApprovalFormsEnum')

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
                        <span class="text-[15px]">{{ __('Enrégistrez les certificats ou attestations de chaque formation à laquelle vous avez pris part.') }}</span>
                    </div>
    
                    @session('success')
                        <x-alert class="mt-4 sm:mt-6" variant="success">{{ __($value) }}</x-alert>
                    @endsession

                    @if ($certificates->count())
                        <div class="mt-4 md:mt-6 text-[15px] overflow-x-scroll sm:overflow-hidden">
                            <x-table>
                                <x-table.header>
                                    <x-table.head class="border-b border-whisper">{{ __('Thème') }}</x-table.head>
                                    <x-table.head>{{ __('Date de début') }}</x-table.head>
                                    <x-table.head>{{ __('Date de fin') }}</x-table.head>
                                    <x-table.head class="sm:text-left">{{ __('Actions') }}</x-table.head>
                                </x-table.header>
                                <x-table.body>
                                    @foreach ($certificates as $certificate)
                                        <x-table.row class="divide-x-0">
                                            <x-table.cell class="px-2 md:px-4 max-w-[200px] border-b border-whisper">{{ $certificate->subject }}</x-table.cell>
                                            <x-table.cell class="px-2 md:px-4">{{ $certificate->starts_at->format('d/m/Y') }}</x-table.cell>
                                            <x-table.cell class="px-2 md:px-4">{{ $certificate->ends_at->format('d/m/Y') }}</x-table.cell>
                                            <x-table.cell class="px-2 md:px-4">
                                                <x-form method="POST" action="{{ route('certificats.destroy', $certificate->id) }}" class="w-fit text-center">
                                                    @method('DELETE')
                                                    <x-button size="sm" class="py-1 px-2" variant="outline" type="submit">
                                                        <x-lucide-trash-2 class="w-[20px] h-[20px] stroke-[1.5] stroke-error" />
                                                    </x-button>
                                                </x-form>
                                            </x-table.cell>
                                        </x-table.row>

                                    @endforeach
                                </x-table.body>
                            </x-table>
                        </div>
                    @endif

                    <div class="mt-4 md:mt-6 p-4 bg-whisper/30 border border-rainee/25">
                        <x-form action="{{ route('certificats.store') }}" method="POST" enctype="multipart/form-data">
                            
                            <x-form.field
                                    name="subject"
                                    label="{{ __('Thème de la formation') }}"
                                    placeholder="{{ __('Entrez le thème de la formation') }}"
                                    required
                                />

                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-4">
                                    <x-form.field
                                        type="date"
                                        name="starts_at"
                                        label="{{ __('Date de début') }}"
                                        required
                                    />

                                    <x-form.field
                                        type="date"
                                        name="ends_at"
                                        label="{{ __('Date de fin') }}"
                                        required
                                    />
                                </div>

                                <x-form.field
                                    name="location"
                                    label="{{ __('Lieu de formation') }}"
                                    placeholder="{{ __('Ex: UJKZ, Batiment Belge') }}"
                                    required
                                />
                                
                                <x-form.field
                                    name="trainer_name"
                                    label="{{ __('Structure formatrice') }}"
                                    placeholder="{{ __('Entrez le nom de la structure/organisme formateur(trice)') }}"
                                    required
                                />

                                <x-form.field
                                    type="file"
                                    name="file"
                                    accept="application/pdf"
                                    label="{{ __('Fichier (Attestation/Certificat en pdf)') }}"
                                    required
                                />

                                <div class="mt-4">
                                    <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                        {{ __('Enrégistrer') }}
                                    </x-button>
                                </div>
                        </x-form>
                    </div>
                </div>

                <div class="mt-8 md:mt-12" id="next-button">
                    <x-form method="POST" action="{{ route('approval.goto') }}">
                        <x-input type="hidden" name="page" value="{{ ApprovalFormsEnum::CERTIFICATES->value }}" required />
                        <x-button variant="primary" class="font-franklin-medium" widthFull>
                            <span>{{ __('Suivant') }}</span>
                            <x-lucide-arrow-right class="w-5 h-5 ml-2" />
                        </x-button>
                    </x-form>
                </div>
			</div>
        </div>

	</main>
</x-base-layout>
