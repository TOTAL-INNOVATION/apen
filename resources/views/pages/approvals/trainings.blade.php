@use('App\Enums\TrainingLevelEnum')

@php
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
	$trainings = $approval->trainings;
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Formations') }}</x-slot:title>
        <meta name="description" content="Entrez les différentes formations dont vous avez pris part.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Formations') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Formations') }}</h2>

                <div class="mt-4 md:mt-6 p-2 bg-whisper/50 border border-rainee/25">
                    <span class="font-franklin-medium">{{ __('Note: ') }}</span>
                    <span class="text-[15px]">{{ __('Indiquer le nom exact de chaque diplôme (ex : master en économie de la santé, option santé public) y compris le diplôme le plus élevé.') }}</span>
                </div>

                @session('success')
                    <x-alert class="mt-4 sm:mt-6" variant="success">{{ __($value) }}</x-alert>
                @endsession
                
                @if ($trainings->count())
                    <div class="mt-4 md:mt-6 text-[15px] overflow-x-scroll sm:overflow-hidden">
                        <x-table>
                            <x-table.header>
                                <x-table.head class="border-b border-whisper">{{ __('Nom') }}</x-table.head>
                                <x-table.head>{{ __('Niveau') }}</x-table.head>
                                <x-table.head>{{ __('Année') }}</x-table.head>
                                <x-table.head class="sm:text-left">{{ __('Actions') }}</x-table.head>
                            </x-table.header>
                            <x-table.body>
                                @foreach ($trainings as $training)
                                    <x-table.row class="divide-x-0">
                                        <x-table.cell class="px-2 md:px-4 border-b border-whisper">{{ $training->name }}</x-table.cell>
                                        <x-table.cell class="px-2 md:px-4">{{ $training->level }}</x-table.cell>
                                        <x-table.cell class="px-2 md:px-4">{{ $training->procured_at }}</x-table.cell>
                                        <x-table.cell class="px-2 md:px-4">
                                            <x-form method="POST" action="{{ route('formation.destroy', $training->id) }}" class="w-fit text-center">
                                                @method('DELETE')
                                                <x-button size="sm" class="py-1 px-2" variant="outline" type="submit">
                                                    <x-lucide-trash-2 class="w-[20px] h-[20px] stroke-[1.5] stroke-error" />
                                                </x-button>
                                            </x-form>
                                        </x-table.cell>
                                    </x-table.row>

                                @endforeach
                            </x-table.body>
                        </x-table>
                    </div>
                @endif

				<div class="mt-4 md:mt-6 p-4 bg-whisper/30 border border-rainee/25">
					<x-form action="{{ route('formations.store') }}" method="POST">
						
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                            <x-form.field
                                name="name"
                                label="{{ __('Nom de la formation') }}"
                                placeholder="{{ __('Entrez le nom de la formation') }}"
                                required
                            />

                            <x-form.field.select label="{{ __('Niveau') }}" name="level" required>
                                @foreach (TrainingLevelEnum::values() as $level)
                                    <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </x-form.field.select>

                            <x-form.field
                                name="level_precision"
                                label="{{ __('Niveau de la formation') }}"
                                placeholder="{{ __('Précisez le niveau de la formation') }}"
                                required
                            />

                            <x-form.field
                                type="number"
                                name="procured_at"
                                label="{!! __('Année d\'obtention') !!}"
                                placeholder="{{ __('Ex: 2024') }}"
                                required
                            />

                            <div class="sm:col-span-2">
                                <x-form.field
                                    name="trainer_name"
                                    label="{{ __('Établissement') }}"
                                    placeholder="{{ __('Entrez le nom du centre de formation') }}"
                                    required
                                />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                {{ __('Enrégistrer') }}
                            </x-button>
                        </div>

					</x-form>
				</div>

                @if ($trainings->count())
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
