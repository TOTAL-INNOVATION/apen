@use('App\Enums\QualificationEnum')

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Associés') }}</x-slot:title>
        <meta name="description" content="Ajouter des associés de votre société.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Associés') }}"
                    class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Associés') }}</h2>

				<div class="mt-4 md:mt-6 overflow-x-scroll">
					<x-table>
						<x-table.header>
							<x-table.row>
								<x-table.head>#</x-table.head>
								<x-table.head>{{ __('Nom complet') }}</x-table.head>
								<x-table.head>{{ __('Fonction') }}</x-table.head>
								<x-table.head>{{ __('Qualification') }}</x-table.head>
								<x-table.head>{{ __('Action') }}</x-table.head>
							</x-table.row>
						</x-table.header>

						<x-table.body>
							@forelse ($approval->associates as $key => $associate)
								<x-table.row>
									<x-table.cell>{{ $key + 1 }}</x-table.cell>
									<x-table.cell>{{ $associate->fullname }}</x-table.cell>
									<x-table.cell>{{ $associate->role }}</x-table.cell>
									<x-table.cell>{{ $associate->qualification->value }}</x-table.cell>
									<x-table.cell>
										<x-form method="POST" action="#" class="w-full text-center">
											@method('DELETE')
											<x-button size="sm" variant="outline" type="submit">
												<x-lucide-trash-2 class="w-5 h-5" />
											</x-button>
										</x-form>
									</x-table.cell>
								</x-table.row>
							@empty
								<x-table.row>
									<x-table.cell colspan="5" class="text-center">
										<span>{{ __('Aucun associé disponible. Veuillez en ajouter au moins un.') }}</span>
									</x-table.cell>
								</x-table.row>
							@endforelse
						</x-table.body>
					</x-table>
				</div>

				<div class="mt-4 md:mt-6">

						<div class="mb-4 md:mb-6">
							<h3 class="heading-3 uppercase">{{ __('Ajouter un associé') }}</h3>
						</div>

						<x-form action="#" method="POST">

							<x-form.field
							name="lastname"
							label="{{ __('Nom') }}"
							placeholder="{!! __('Entrez le nom de l\'associé') !!}"
							required
						/>

						<x-form.field
							name="firstname"
							label="{{ __('Prénom') }}"
							placeholder="{!! __('Entrez le nom de l\'associé prénom') !!}"
							required
						/>

						<x-form.field
							name="role"
							label="{{ __('Fonction dans la société') }}"
							placeholder="{!! __('Ex: CTO') !!}"
							required
						/>

						<x-form.field.select
							label="{{ __('Qualification') }}"
							name="qualification">
							@foreach (QualificationEnum::values() as $qualification)
								<option value="{{ $qualification }}">{{ $qualification }}</option>
							@endforeach
						</x-form.field.select>

						<x-form.field
                            label="{{ __('Agrément') }}"
                            type="file"
                            name="approval"
                            accept="pdf, doc, docx"
                            required
                        />
						
						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                {{ __('Enrégistrer') }}
                            </x-button>
                        </div>
					</x-form>
				</div>

				<div class="mt-4 md:mt-6">
					<x-button variant="primary" class="font-franklin-medium" component="a" href="#" widthFull>
						<span>{{ __('Suivant') }}</span>
						<x-lucide-arrow-right class="w-5 h-5 ml-2" />
					</x-button>
				</div>
			</div>
		</div>
	</main>
</x-base-layout>
