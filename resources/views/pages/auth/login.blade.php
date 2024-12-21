<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Vous connecter') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Me connecter') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="mt-4 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="auth-card">
                <x-form>
                    <x-card class="max-w-sm sm:max-w-xl mx-auto">
                        <x-card.header class="block">
                            <x-card.title class="heading-2 uppercase mx-auto">{{ __('Se connecter') }}</x-card.title>
                        </x-card.header>
                        <x-card.body>
                            <x-form.field type="email" name="email" label="{{ __('Adresse mail') }}"
                                placeholder="{{ __('ex: exemple@gmail.com') }}" required />

                            <x-form.field type="password" name="password" label="{{ __('Mot de passe') }}"
                                placeholder="{{ __('Entrez votre mot de passe') }}" required />

                            <div class="mt-6 md:mt-8">
                                <x-button widthFull>{{ __('Me connecter') }}</x-button>
                            </div>
                        </x-card.body>
						<x-card.footer>
							<x-link href="#" class="underline underline-offset-4">
								<strong>{{ __('Mot de passe oublié?') }}</strong>
							</x-link>
						</x-card.footer>
                    </x-card>
                </x-form>

				<div class="my-4 sm:my-6 space-y-2">
					<p>{{ __('Pas encore de compte') }}?
						<x-link href="#" class="underline underline-offset-4">
							<strong>{{ __('Créez-en un') }}</strong>
						</x-link>
					</p>
				</div>
            </div>

        </div>
    </main>
</x-base-layout>
