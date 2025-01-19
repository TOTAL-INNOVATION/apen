<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Devenir expert') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Devenir expert') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <h2 class="heading-2 uppercase">{{ __('Devenir expert') }}</h2>

			<div class="mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
				<x-priority-card
					title="{{ __('Conditions d’obtention de l’agrément d’expert') }}"
					:imageSrc="null"
					href="{{ route('becomeExpert.conditions') }}"
					withoutDescription
				/>

				<x-priority-card
					title="{!! __('Procédure d\'inscription pour un agrément') !!}"
					:imageSrc="null"
					href="{{ route('becomeExpert.procedure') }}"
					withoutDescription
				/>

				<x-priority-card
					title="{!! __('Formulaire de candidature') !!}"
					:imageSrc="null"
					href="{{ route('becomeExpert.form') }}"
					withoutDescription
				/>
			</div>
		</div>
	</main>
</x-base-layout>
