<x-base-layout>
    <x-slot:metadata>
        <x-slot:title>{{ __('Nous contacter') }}</x-slot:title>
        <meta name="description" content="Homepage">
    </x-slot:metadata>

    <main class="py-4 mb-4 sm:mb-6 lg:mb-8">
        <div class="px-4 sm:px-0 container">
            <x-breadcrumb>
                <x-breadcrumb.item href="{{ route('home') }}" text="{{ __('Accueil') }}" isHead />
                <x-breadcrumb.item href="#" text="{{ __('Contacts') }}" class="font-franklin-medium" />
            </x-breadcrumb>
        </div>

        <div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
            <h2 class="heading-2 uppercase">{{ __('Nous contacter') }}</h2>

            <div class="mt-4 md:mt-6 flex flex-col-reverse md:grid md:grid-cols-3 gap-4 sm:gap-6">
                <div class="md:col-span-2">
                    <x-form>
                        <x-card>
                            <x-card.body>
								<div class="py-4">
									<p><span class="font-franklin-medium">Note:</span> {{ __('Tous les champs sont obligatoires') }}</p>
								</div>
                                <div class="lg:grid lg:grid-cols-2 gap-x-6">
                                    <x-form.field name="lastname" label="{{ __('Nom') }}"
                                        placeholder="{{ __('Entrez votre nom') }}" required />

                                    <x-form.field name="firstname" label="{{ __('Prénom') }}"
                                        placeholder="{{ __('Entrez votre prénom') }}" required />

                                    <div class="lg:col-span-2">
                                        <x-form.field type="email" name="email" label="{{ __('Adresse mail') }}"
                                            placeholder="{{ __('ex: exemple@gmail.com') }}" required />

                                        <x-form.field name="object" label="{{ __('Sujet') }}"
                                            placeholder="{!! __('L\'objet de votre message') !!}" required />

                                        <x-form.field.textarea name="message" label="{{ __('Message') }}"
                                            placeholder="{{ __('Ecrivez votre message ici...') }}" class="mb-0 sm:mb-0"
                                            required />
                                    </div>
                                </div>
                            </x-card.body>
                            <x-card.footer class="justify-center">
                                <x-button variant="primary"
                                    class="font-franklin-medium">{{ __('Envoyer le message') }}</x-button>
                            </x-card.footer>
                        </x-card>
                    </x-form>
                </div>

                <div>
                    <x-card class="h-full">
                        <x-card.body>
                            <div>
                                <div class="flex">
                                    <x-lucide-phone class="w-4" />
                                    <span class="ml-1 font-franklin-medium">{{ __('Téléphone') }}: </span>
                                </div>
                                <x-nav class="pl-1 mt-1 md:mt-2" direction="vertical">
                                    <x-link href="tel:+22625314493">{{ __('+226 25 31 44 93') }}</x-link>
                                    <x-link href="tel:+22625490088">{{ __('+226 25 49 00 88') }}</x-link>
                                    <x-link href="tel:+22625490245">{{ __('+226 25 49 02 45') }}</x-link>
                                </x-nav>
                            </div>

                            <div class="mt-2 md:mt-3">
                                <div class="flex">
                                    <x-lucide-map-pin class="w-[18px]" />
                                    <span class="ml-1 font-franklin-medium">{{ __('Adresse') }}: </span>
                                </div>

                                <div class="pl-1 mt-1 md:mt-2 flex flex-col space-y-2">
                                    <span>01 BP 514 Ouagadougou 01</span>
                                    <span>Burkina Faso, Kadiogo</span>
                                </div>
                            </div>

                            <div class="mt-2 md:mt-3">
                                <div class="flex">
                                    <x-lucide-mail class="w-4" />
                                    <span class="ml-1 font-franklin-medium">{{ __('Email') }}: </span>
                                    <x-link class="ml-1"
                                        href="mailto:infos@commerce.gov.bf">infos@commerce.gov.bf</x-link>
                                </div>
                            </div>
                        </x-card.body>
                    </x-card>
                </div>
            </div>
        </div>
    </main>
</x-base-layout>
