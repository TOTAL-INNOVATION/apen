<div class="w-full bg-white hidden md:flex">
    <div class="px-4 py-1.5 flex-initial bg-secondary text-sm font-franklin-medium text-white uppercase border-b border-secondary">
        {{ __('Flash info') }}
    </div>
    <div class="py-1.5 flex-1 border-b border-whisper overflow-x-hidden">
        <div class="w-full text-nowrap animate-text-x-scroll">Agence de promotion de l’expertise nationale : 1ère session de l’Assemblée Générale des Experts tenue le 09 décembre 2022</div>
    </div>
</div>
<header class="w-full bg-white sticky top-0 z-50">
    
    <div class="py-2 border-b border-whisper">
        <div class="px-4 sm:px-auto container flex items-center justify-between md:px-0 md:justify-normal">
            <div class="flex-initial">
                <a href="#">
                    <img src="{{ asset('logo.png') }}" class="w-16 sm:w-20 md:w-24" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="hidden md:block flex-1"> 
                <div class="heading-2 text-primary uppercase text-center">
                    <span>{{ __('Agence de Promotion') }}</span><br>
                    <span>{{ __('de l’Expertise Nationale') }}</span>
                </div>
            </div>
            <div class="flex-initial">
                <x-button component="a">{{ __('Se connecter') }}</x-button>
            </div>
        </div>
    </div>

    <div class="hidden md:block border-b border-whisper">
        <div class="md:w-full md:webkit-scrollbar-none md:overflow-x-scroll md:mx-auto lg:w-fit">
            <x-nav class="py-0">
                <x-nav.custom-link href="{{ route('home') }}">{{ __('Accueil') }}</x-nav.custom-link>
                <x-dropdown class="m-0" showOnHover>
                    <x-dropdown.trigger class="px-4 py-2.5 h-full text-base text-nowrap inline-flex justify-center items-center gap-x-1 cursor-pointer border-0 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:bg-primary after:transition-all hover:bg-transparent hover:after:navlink-hover-effect">
                        <span>{{ __('À propos') }}</span>
                        <x-dropdown.icon />
                    </x-dropdown.trigger>

                    <x-dropdown.content class="p-0 m-0 border-whisper rounded-none">
                        <x-dropdown.item href="{{ route('whoWeAre') }}" size="default" class="font-normal">
                            {{ __('Qui sommes-nous?') }}
                        </x-dropdown.item>

                        <x-dropdown.item href="{{ route('secretaryWords') }}" size="default" class="font-normal">
                            {{ __('Mot de la secrétaire exécutive') }}
                        </x-dropdown.item>

                        <x-dropdown.item href="{{ route('decrees') }}" size="default" class="font-normal">
                            {{ __('Textes reglémentaires') }}
                        </x-dropdown.item>
                    </x-dropdown.content>
                    
                </x-dropdown>
                <x-nav.custom-link href="{{ route('becomeExpert.index') }}">{{ __('Devenir expert') }}</x-nav.custom-link>
                <x-nav.custom-link href="#">{{ __('Contacter un expert') }}</x-nav.custom-link>
                <x-nav.custom-link href="{{ route('news') }}">{{ __('Actualités') }}</x-nav.custom-link>
                <x-nav.custom-link href="{{ route('contacts') }}">{{ __('Contacts') }}</x-nav.custom-link>
            </x-nav>
        </div>
    </div>

</header>
