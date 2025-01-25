@use('App\Enums\ApprovalStatusEnum')

@php
    $user = user();
    $approval = $user->approval;
@endphp

<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Profil') }}</x-slot:title>
        <meta name="description" content="Mon profil">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Profil') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 sm:px-0 container">
            <div class="max-w-2xl mx-auto">

                @session('success')
                    <x-alert class="mb-4 sm:mb-6" variant="success">{{ __($value) }}</x-alert>
                @endsession

                @session('error')
                    <x-alert class="mb-4 sm:mb-6" variant="error">{{ __($value) }}</x-alert>
                @endsession

                <x-form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                    <x-form.label for="avatar"
                        class="mx-auto relative w-36 h-36 border-[4px] border-rainee rounded-full"
                        title="Cliquez pour charger une image">
                        <img src="{{ $user->avatar }}" alt="{{ $user->fullname }}" class="w-full h-full rounded-full"
                            id="preview">

                        <span class="mb-0 p-1 absolute bottom-0 right-0 bg-white border-2 border-rainee rounded-full">
                            <x-lucide-camera class="w-6 h-6 stroke-dark/50" />
                        </span>
                    </x-form.label>

                    <x-input id="avatar" name="avatar" type="file" class="hidden"
                        accept="image/png, image/jpg, image/jpeg" required />

                    <div class="mx-auto mt-4 md:mt-6 w-fit hidden" id="submit-container">
                        <x-button variant="primary" type="submit" class="font-franklin-medium">
                            {{ __('Enrégistrer l\'avatar') }}
                        </x-button>
                    </div>

                    @error('avatar')
                        <p class="mt-4 md:mt-6 text-center text-error">{{ $message }}</p>
                    @enderror
                </x-form>

                @if ($approval)
                    <div class="w-full mt-4 md:mt-6 p-2 flex space-x-1 bg-warning/40 border border-warning/60">
                        <span class="text-[15px]">{{ __('Vous avez un demande d\'agrément actuellement') }}</span>
                        <span class="font-semibold">"{{ $approval->status }}"</span>
                        <x-link href="{{ route('becomeExpert.form') }}" class="flex items-center font-semibold">
                            {{ __('. Poursuivre') }}
                            <x-lucide-arrow-right class="w-4 h-4 ml-1" />
                        </x-link>
                    </div>
                @endif

                <x-card class="mt-4 md:mt-6">
                    <x-card.header>
                        <x-card.title class="uppercase">{{ __('Modifier mes informations') }}</x-card.title>
                    </x-card.header>

                    <x-card.body>
                        <x-form method="POST" action="{{ route('profile.updateInfo') }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-4">
                                <x-form.field name="lastname" label="Nom" placeholder="{{ __('Entrez votre nom') }}"
                                    value="{{ $user->lastname }}" required />

                                <x-form.field name="firstname" label="Prénom"
                                    placeholder="{{ __('Entrez votre prénom') }}" value="{{ $user->firstname }}"
                                    required />

                                <x-form.field type="email" name="email" label="Adresse email"
                                    placeholder="{{ __('Ex: exemple@gmail.com') }}" value="{{ $user->email }}"
                                    required />

                                <x-form.field type="email" name="email_confirmation"
                                    label="Confirmez votre adresse email"
                                    placeholder="{{ __('Ex: exemple@gmail.com') }}" value="{{ $user->email }}"
                                    required />
                            </div>

                            <div class="mt-4 md:mt-6 flex justify-center">
                                <x-button variant="primary" type="submit" class="font-franklin-medium">
                                    {{ __('Enrégistrer les modifications') }}
                                </x-button>
                            </div>
                        </x-form>
                    </x-card.body>
                </x-card>

                <x-card class="mt-4 md:mt-6">

                    <x-card.header>
                        <x-card.title class="uppercase">{{ __('Modifier mon mot de passe') }}</x-card.title>
                    </x-card.header>

                    <x-card.body>
                        <x-form action="{{ route('profile.updatePassword') }}" method="POST">
                            <x-form.field type="password" name="password" label="Mot de passe"
                                placeholder="{{ __('Entrez votre mot de passe') }}" required />

                            <x-form.field type="password" name="password_confirmation"
                                label="Confirmez votre mot de passe"
                                placeholder="{{ __('Entrez à nouveau votre mot de passe') }}" required />

                            <div class="mt-4 md:mt-6 flex justify-center">
                                <x-button variant="primary" type="submit" class="font-franklin-medium">
                                    {{ __('Enrégistrer les modifications') }}
                                </x-button>
                            </div>
                        </x-form>
                    </x-card.body>
                </x-card>

            </div>
        </div>

    </main>
</x-base-layout>
