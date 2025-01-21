@use('App\Enums\ApprovalTypeEnum')

@php
	$category = $approval->type;
@endphp

<x-base-layout>

    <x-slot:metadata>
        <x-slot:title>{{ __('Domaines et sous domaines') }}</x-slot:title>
        <meta name="description" content="Choisissez le nombre de domaines sollicités.">
    </x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="{{ route('becomeExpert.index') }}" text="{{ __('Devenir expert') }}" />
                <x-breadcrumb.item href="#" text="{{ __('Total des domaines') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Total des domaines') }}</h2>

				<div class="mt-4 md:mt-6 p-2 bg-whisper/50 border border-rainee/25">
					<span class="font-franklin-medium">{{ __('Note: ') }}</span>
					<span class="text-[15px]">{!! Str::markdown(__('Veuillez sélectionner le nombre de domaines que vous sollicitez. Pour cette **:category**, vous ne pouvez en sélectionner que :max au maximum', ['category' => $category->value, 'max' => ApprovalTypeEnum::maxDomains($category)])) !!}</span>
				</div>

				<div class="mt-4 md:mt-6">
					<x-form action="{{ route('domains.total') }}" method="POST">
						<div>
							<p class="mb-2 block font-franklin-medium">{{ __('Nombre de domaines sollicités') }}</p>
							<div class="space-y-2">
								<p class="flex items-center space-x-2">
									<x-radio
										id="one"
										name="total_sectors"
										class="w-5 h-5"
										value="1"
										:checked="$approval->total_sectors===1||$approval->total_sectors===null"
									/>
									<x-form.label class="text-lg font-franklin-regular font-medium mb-0" for="one">{{ __('Un (01)') }}</x-form.label>
								</p>
								
								<p class="flex items-center space-x-2">
									<x-radio
										id="two"
										name="total_sectors"
										class="w-5 h-5"
										value="2"
										:checked="$approval->total_sectors===2"
									/>
									<x-form.label class="text-lg font-franklin-regular font-medium mb-0" for="two">{{ __('Deux (02)') }}</x-form.label>
								</p>

								@if ($category === ApprovalTypeEnum::CATEGORY_A)
									<p class="flex items-center space-x-2">
										<x-radio
											id="three"
											name="total_sectors"
											class="w-5 h-5"
											value="3"
											:checked="$approval->total_sectors===3"
										/>
										<x-form.label class="text-lg font-franklin-regular font-medium mb-0" for="three">{{ __('Trois (03)') }}</x-form.label>
									</p>
								@endif
							</div>

							@error('total_sectors')
								<p class="text-error mt-2">{{ $message }}</p>
							@enderror
						</div>

						<div class="mt-4 md:mt-6">
                            <x-button variant="primary" class="font-franklin-medium" type="submit" widthFull>
                                <span>{{ __('Suivant') }}</span>
                                <x-lucide-arrow-right class="w-5 h-5 ml-2" />
                            </x-button>
                        </div>
					</x-form>
				</div>

			</div>
		</div>
	</main>

</x-base-layout>
