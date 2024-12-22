<x-auth-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Créer un compte') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <div class="auth-card">
		<x-form method="POST" action="{{ route('register.attempt') }}">
			<x-card class="max-w-sm sm:max-w-xl mx-auto">
				<x-card.header class="block">
					<x-card.title class="heading-2 uppercase text-center">{{ __('Créer un compte') }}</x-card.title>
				</x-card.header>
				<x-card.body>

					<div class="py-4">
						<p><span class="font-franklin-medium">Note:</span> {{ __('Tous les champs sont obligatoires') }}</p>
					</div>

					<x-form.field
						name="lastname"
						label="{{ __('Nom') }}"
						placeholder="{{ __('Entrez votre nom') }}"
						required
					/>

					<x-form.field
						name="firstname"
						label="{{ __('Prénom') }}"
						placeholder="{{ __('Entrez votre prénom') }}"
						required
					/>
					
					<x-form.field
						type="email"
						name="email"
						label="{{ __('Adresse mail') }}"
						placeholder="{{ __('ex: exemple@gmail.com') }}"
						required
					/>

					<x-form.field
						type="password"
						name="password"
						label="{{ __('Mot de passe') }}"
						placeholder="{{ __('Entrez votre mot de passe') }}"
						required
					/>

					<x-form.field
						type="password"
						name="password_confirmation"
						label="{{ __('Confirmer le mot de passe') }}"
						placeholder="{{ __('Entrez votre mot de passe') }}"
						required
					/>

					<div class="mt-6 md:mt-8">
						<x-button type="submit" widthFull>{{ __('M\'inscrire') }}</x-button>
					</div>
				</x-card.body>
			</x-card>
		</x-form>

		<div class="my-4 sm:my-6 space-y-2">
			<p>{{ __('Vous avez déjà un compte') }}?
				<x-link href="{{ route('login.view') }}" class="underline underline-offset-4">
					<strong>{{ __('Connectez-vous') }}</strong>
				</x-link>
			</p>
		</div>
	</div>
</x-auth-layout>
