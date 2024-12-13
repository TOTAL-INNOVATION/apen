<header class="bg-white">
    <div class="w-full hidden md:flex">
        <div class="px-4 py-1.5 flex-initial bg-secondary text-sm font-franklin-medium text-white uppercase border-b border-secondary">
            {{ __('Flash info') }}
        </div>
        <div class="py-1.5 flex-1 border-b border-whisper overflow-x-hidden">
            <div class="w-full text-nowrap animate-text-x-scroll">Agence de promotion de l’expertise nationale : 1ère session de l’Assemblée Générale des Experts tenue le 09 décembre 2022</div>
        </div>
    </div>

    <div class="py-2 border-b border-whisper">
        <div class="px-2 container flex items-center justify-between md:px-0 md:justify-normal">
            <div class="flex-initial">
                <a href="#">
                    <img src="{{ asset('logo.png') }}" class="w-16 sm:w-20 md:w-24" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="hidden md:block flex-1">
                <div class="text-4xl text-primary font-texta-black uppercase text-center">
                    <span>{{ __('Agence de Promotion') }}</span><br>
                    <span>{{ __('de l’Expertise Nationale') }}</span>
                </div>
            </div>
            <div class="flex-initial">
                <x-button component="a">{{ __('Se connecter') }}</x-button>
            </div>
        </div>
    </div>

    <div class="hidden md:block sticky top-0 border-b border-whisper">
        <div class="md:w-full md:webkit-scrollbar-none md:overflow-x-scroll md:mx-auto lg:w-fit">
            <x-nav class="py-0 justify-center">
                <x-nav.custom-link path="{{ route('home') }}">{{ __('Accueil') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('À propos') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('Devenir expert') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('Contacter un expert') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('Projets et programmes') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('Actualités') }}</x-nav.custom-link>
                <x-nav.custom-link path="#">{{ __('Contacts') }}</x-nav.custom-link>
            </x-nav>
        </div>
    </div>

</header>
