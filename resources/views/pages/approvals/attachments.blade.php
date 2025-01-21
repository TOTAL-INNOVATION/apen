@php
	$attachments = $approval->attachments;
	$count = $attachments->count();
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Preuves de la pratique professionnelle') }}</x-slot:title>
        <meta name="description" content="Enrégistrez les fichiers prouvant votre pratique professionnelle">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Preuves') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Preuves de la pratique professionnelle') }}</h2>

				@session('success')
                    <x-alert class="mt-4 sm:mt-6" variant="success">{{ __($value) }}</x-alert>
                @endsession
                
                @if ($count)
                    <div class="mt-4 md:mt-6 text-[15px] overflow-x-scroll sm:overflow-hidden">
                        <x-table>
                            <x-table.header>
                                <x-table.head>{{ __('Nature') }}</x-table.head>
                                <x-table.head>{{ __('Action') }}</x-table.head>
                            </x-table.header>
                            <x-table.body>
								@foreach ($attachments as $attachment)
									<x-table.cell>{{ $attachment->nature }}</x-table.cell>
									<x-table.cell class="flex justify-center">
										<x-form method="POST" action="{{ route('preuves.destroy', $attachment->id) }}" class="w-fit text-center">
											@method('DELETE')
											<x-button size="sm" class="py-1 px-2" variant="outline" type="submit">
												<x-lucide-trash-2 class="w-[20px] h-[20px] stroke-[1.5] stroke-error" />
											</x-button>
										</x-form>
									</x-table.cell>
								@endforeach
							</x-table.body>
						</x-table>
					</div>
				@endif
				
				<div class="mt-4 md:mt-6 p-4 bg-whisper/30 border border-rainee/25">
					<x-form action="{{ route('preuves.store') }}" method="POST" enctype="multipart/form-data">

						<x-form.field
							name="nature"
							label="{{ __('Nature de la pièce') }}"
							placeholder="{{ __('Entrez la nature et nom de la pièce') }}"
							required
						/>

						<x-form.field
							type="file"
							name="file"
							accept="application/pdf"
							label="{{ __('Fichier') }}"
							required
						/>

						<div class="mt-4">
							<x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
								{{ __('Enrégistrer') }}
							</x-button>
						</div>

					</x-form>
				</div>

				@if ($count)
					<div class="mt-8 md:mt-12">
						<x-button variant="primary" class="font-franklin-medium" component="a" href="{{ route('approval.goto') }}" widthFull>
							<span>{{ __('Suivant') }}</span>
							<x-lucide-arrow-right class="w-5 h-5 ml-2" />
						</x-button>
					</div>
				@endif
			</div>
		</div>
	</main>
</x-base-layout>
