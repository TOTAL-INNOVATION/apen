<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Etape final') }}</x-slot:title>
        <meta name="description" content="Entrez votre CV et votre signature.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Etape final') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Etape final') }}</h2>

                <div class="mt-4 md:mt-6">
                    <x-form method="POST" action="#" enctype="multipart/form-data">
						<x-form.field
                            label="{{ __('Votre Curriculum Vitae (CV)') }}"
                            type="file"
                            name="cv"
                            accept="application/pdf"
                            required
                        />

						<x-form.field
                            label="{{ __('Signature en format image') }}"
                            type="file"
                            name="signature"
                            accept="application/pdf"
                            required
                        />

						<div class="mb-4">
							<strong>{{ __('Note: ') }}</strong>
							<span>{{ __('En poursuivant, vous accepter la déclaration sur honneur') }}</span>
						</div>

						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                <span>{{ __('Soumettre et payer') }}</span>
                                <x-lucide-arrow-right class="w-5 h-5 ml-2" />
                            </x-button>
                        </div>
					</x-form>
				</div>
			</div>
		</div>

	</main>
</x-base-layout>