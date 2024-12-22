<x-auth-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Vérifiez votre adresse email') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <div class="auth-card">
		
		@session('success')
			<x-alert class="mb-4 sm:mb-6" variant="success">{{ $value }}</x-alert>
		@endsession

		<x-card>
			<x-card.header class="flex-col justify-center">
				<div>
					<img src="{{ asset('assets/envelop.svg') }}" class="w-20 sm:w-24 md:w-28 lg:w-32" alt="Enveloppe">
				</div>
				<x-card.title class="uppercase text-center">{{ __('Vérifiez votre adresse email') }}</x-card.title>
			</x-card.header>
			<x-card.body>
				<p>{{ __('Nous venons de vous envoyer un mail de vérification.') }}</p>
				<p>{!! Str::markdown(__('Veuillez cliquer sur le bouton **Activer mon compte** pour confirmer votre inscription et pouvoir par la suite candidater pour un agrément.')) !!}</p>
				<p class="mt-2 sm:mt-4">{{ __('Pas encore reçu de mail?') }}</p>
			</x-card.body>
			<x-card.footer class="pt-0 sm:pt-0">
				<x-form class="w-full" method="POST" action="{{ route('verification.resend') }}">
					<x-button type="submit" widthFull>
						<strong>{{ __('Renvoyer le mail') }}</strong>
					</x-button>
				</x-form>
			</x-card.footer>
		</x-card>
	</div>
</x-auth-layout>
