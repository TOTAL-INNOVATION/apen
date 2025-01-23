<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Paiement') }}</x-slot:title>
        <meta name="description" content="Boucler votre candidature.">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Paiement') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <div class="max-w-lg mx-auto">
                <h2 class="heading-2 uppercase">{{ __('Paiement') }}</h2>


				<div class="mt-4 md:mt-6">
					<p class="mb-4 block font-franklin-medium cursor-pointer">{{ __('Sélectionner un moyen de paiement') }}</p>
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="payment-methods">
						
						<label for="orange-money" class="p-2 relative flex items-center space-x-3 bg-white border border-whisper cursor-pointer">
							<x-radio id="orange-money" name="method" class="w-5 h-5 sm:w-6 sm:h-6 bg-whisper/50 border-2 border-rainee" value="*144*4*6*montant#" checked />
							<div class="flex items-center space-x-3">
								<img src="{{ asset('assets/orange_money.png') }}" class="w-9 h-9 border border-black rounded-xl" alt="Orange Money">
								<span class="block font-franklin-medium text-dark">{{ __('Orange Money') }}</span>
							</div>
						</label>

						<label for="moov-money" class="p-2 relative flex items-center space-x-3 bg-white border border-whisper cursor-pointer">
							<x-radio id="moov-money" name="method" class="w-5 h-5 sm:w-6 sm:h-6 bg-whisper/50 border-2 border-rainee" value="*555*6#" />
							<div class="flex items-center space-x-3">
								<img src="{{ asset('assets/moov_money.webp') }}" class="w-9 h-9 border border-whisper rounded-xl" alt="Moov Money">
								<span class="block font-franklin-medium text-dark">{{ __('Moov Money') }}</span>
							</div>
						</label>
					</div>
				</div>				
				
				<div class="mt-4 md:mt-6">
					
					<div class="p-2 bg-whisper/50 border border-rainee/25 flex">
						<span class="font-franklin-medium">{{ __('Note: ') }}</span>
						<div class="text-[15px] indent-2">Pour éffectuer le paiement, veuillez générer le code <strong>OTP</strong> en tappant <span id="code" class="font-franklin-medium">*144*4*6*montant#</span> suivi de son code secret.
						</div>
					</div>

					<div class="mt-4 md:mt-6">
						<x-form.field
							type="number"
							name="phone"
							label="Numéro de téléphone"
							placeholder="{{ __('Ex: 00226-XX-XX-XX-XX') }}"
							required
						/>

						<x-form.field
							type="number"
							name="otp"
							label="Le code OTP généré"
							placeholder="{{ __('XX-XX') }}"
							required
						/>
						
						<div class="mt-4 md:mt-6 flex justify-center">
							<x-button variant="primary" type="submit" class="font-franklin-medium" widthFull>
								{{ __('Éffectuer le paiement') }}
							</x-button>
						</div>
					</div>

				</div>
			</div>
		</div>

	</main>
</x-base-layout>
