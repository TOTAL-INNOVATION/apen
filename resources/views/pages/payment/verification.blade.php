@use('App\Enums\TransactionStatusEnum')

<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Paiement') }}</x-slot:title>
        <meta name="description" content="Boucler votre candidature.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Paiement - Vérification') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>
		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="min-h-64 max-w-lg mx-auto text-center">
				@if ($transaction->status === TransactionStatusEnum::PENDING)
					<div class="mt-4 md:mt-6 inline-flex justify-center" data-should-verifiy>
						<div class="space-y-4 text-center">
							<img src="{{ asset('assets/pending.svg') }}" alt="Vérification en cours" class="w-24 mx-auto" />
							<p class="text-lg font-franklin-medium">{{ __('Vérification de la transaction en cours') }}</p>
						</div>
					</div>

				@else
					<div class="mt-4 md:mt-6 inline-flex justify-center">
						<div class="space-y-4 text-center">
							<img src="{{ asset('assets/success.svg') }}" alt="Transaction réussi" class="w-24 mx-auto" />
							<p class="text-lg font-franklin-medium">{{ __('La transaction a été un succès.') }}</p>
							<div class="w-fit mx-auto">
								<x-button variant="primary" href="{{ route('profile.approvals') }}" component="a" class="font-franklin-medium">
									{{ __('Consulter mes agréments') }}
								</x-button>

							</div>
						</div>
					</div>
				@endif

			</div>
		</div>

	</main>
</x-base-layout>
