@use('App\Enums\ApprovalStatusEnum')

<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Profil') }}</x-slot:title>
        <meta name="description" content="Mon profil">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('profile.index') }}" text="{{ __('Accueil') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Agréments') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Agréments') }}</h2>

                <div class="mt-4 md:mt-6 space-y-4">
                    @forelse (user()->approvals as $approval)
                        <x-card class="p-4 hover:bg-whisper/10">
                            <div class="h-16">
                                <h3 class="text-xl md:text-2xl lg:text-3xl font-texta-black uppercase">{{ 'Agrément de ' . $approval->type->value }}</h3>
                                <span class="mt-2 inline-flex items-center space-x-2 font-semibold uppercase">
                                    <span>{{ __('Statut: ') }}</span>
                                    <span class="text-primary">{{ $approval->status }}</span>
                                </span>
                            </div>
                            <div class="pt-4 flex items-center justify-between">
                                <span class="text-chocolate font-franklin-medium">{{ __('Créé le :date', ['date' => $approval->created_at->format('d/m/Y')]) }}</span>
                                @if ($approval->status === ApprovalStatusEnum::IN_PROGRESS)
                                    <x-link href="{{ route('becomeExpert.form') }}" class="font-semibold underline underline-offset-2">{{ __('Poursuivre') }}</x-link>
                                @endif
                            </div>
                        </x-card>
                    @empty
                        <div class="sm:col-span-2 lg:col-span-3 min-h-64 flex flex-col justify-center items-center">
                            <div>
                                <x-lucide-inbox class="w-14 h-14 stroke-[1.5] stroke-rainee" />
                            </div>
                            <p class="mt-4 text-lg">{{ __('Aucune demande agrément disponible pour le moment') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
	</main>
</x-base-layout>
