<x-auth-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Réinitialiser mon mot de passe') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <div class="auth-card">

        @session('error')
			<x-alert class="mb-4 sm:mb-6" variant="error">{{ __($value) }}</x-alert>
		@endsession

        <x-form method="POST" action="{{ route('password.sendLink') }}">
            <x-card class="max-w-sm sm:max-w-xl mx-auto">
                <x-card.header class="block">
                    <x-card.title class="heading-2 uppercase text-center">{{ __('Réinitialiser mon mot de passe') }}</x-card.title>
                </x-card.header>
                <x-card.body>
                    <x-form.field type="email" name="email" label="{{ __('Votre adresse mail') }}"
                        placeholder="{{ __('ex: exemple@gmail.com') }}" required />

                    <div class="mt-6 md:mt-8">
                        <x-button type="submit" widthFull>
							<strong>{{ __('Envoyer la requête') }}</strong>
						</x-button>
                    </div>
                </x-card.body>
            </x-card>
        </x-form>

        <div class="my-4 sm:my-6 space-y-2">
            <p>{{ __('Vous rappelez-vous de votre mot de passe?') }}
                <x-link href="{{ route('login.view') }}" class="underline underline-offset-4">
                    <strong>{{ __('Connectez-vous') }}</strong>
                </x-link>
            </p>
        </div>
    </div>
</x-auth-layout>
