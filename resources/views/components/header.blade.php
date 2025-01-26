@use('App\Models\User')
@use('App\Enums\RoleEnum')

@if ($infos->count())
    <div class="w-full bg-white hidden md:flex">
        <div class="px-4 py-1.5 flex-initial bg-secondary text-sm font-franklin-medium text-white uppercase border-b border-secondary">
            {{ __('Flash info') }}
        </div>
        <div class="py-1.5 flex-1 border-b border-whisper overflow-x-hidden">
            <div class="w-full flex items-center space-x-2 text-nowrap animate-text-x-scroll">
                @foreach ($infos as $k => $info)
                    <p class="flex items-center">
                        @if ($k > 0)
                            <span class="mr-2">|</span>
                        @endif
                        <span>{{ $info->title }}</span>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
@endif

<header class="w-full bg-white sticky top-0 z-[80]">
    
    <div class="py-2 border-b border-whisper">
        <div class="px-4 sm:px-auto container flex items-center justify-between md:px-0 md:justify-normal">
            <div class="flex-initial">
                <a class="outline-none" href="{{ route('home') }}">
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
                <div class="flex items-center space-x-4">
                    <x-dropdown class="m-0">
                        @if ($user = user())
                        <x-dropdown.trigger size="default" class="px-2 py-1 sm:px-3 sm:py-2 inline-flex items-center gap-x-2 border border-whisper">
                            @if ($user->avatar === User::DEFAULT_AVATAR)
                                <img class="inline-block size-8 sm:size-9" src="{{ asset('defaults/avatar2.svg') }}" alt="{{ $user->fullname }}">
                            @else
                            <img class="inline-block size-[38px] rounded-full" src="{{ $user->avatar }}" alt="{{ $user->fullname }}">
                            @endif

                            <strong>{{ __('Profil') }}</strong>

                            <x-dropdown.icon />
                            
                        </x-dropdown.trigger>
                        
                        <x-dropdown.content class="p-0 w-44 z-[84]">
                            <div class="mb-1 py-2 px-3 w-full border-b border-whisper">
                                <strong>{{ Str::limit($user->fullname, 17) }}</strong>
                            </div>

                            @if ($user->role === RoleEnum::EXPERT)
                                <x-dropdown.item href="{{ route('profile.index') }}">
                                    <x-lucide-user-2 class="h-5 w-5" />
                                    <strong>{{ __('Portail') }}</strong>
                                </x-dropdown.item>
                            @else
                                <x-dropdown.item href="{{ route('panel') }}">
                                    <x-lucide-layout-dashboard class="h-5 w-5" />
                                    <strong>{{ __('Dashboard') }}</strong>
                                </x-dropdown.item>
                            @endif

                            <x-form method="POST" action="{{ route('logout') }}">
                                <x-dropdown.item component="button" type="submit" widthFull>
                                    <x-lucide-log-out class="h-5 w-5" />
                                    <strong>{{ __('Me déconnecter') }}</strong>
                                </x-dropdown.item>
                            </x-form>
                        </x-dropdown.content>
                        @else
                            <x-button component="a" href="{{ route('login.view') }}" class="font-semibold">{{ __('Se connecter') }}</x-button>
                        @endif
                    </x-dropdown>

                    <div class="md:hidden">
                        <x-button variant="outline" class="px-2.5 py-1 sm:px-3 sm:py-2" aria-haspopup="dialog" aria-expanded="false" aria-controls="apen-offcanvas-menu" data-hs-overlay="#apen-offcanvas-menu">
                            <x-lucide-align-left class="w-5 h-5" />
                        </x-button>
                            
                        <div id="apen-offcanvas-menu" class="hs-overlay hs-overlay-open:translate-x-0 hs-overlay-backdrop-open:bg-dark/30 hidden -translate-x-full fixed top-[71px] sm:top-[84px] md:top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-e border-whisper overflow-y-scrollr" role="dialog" tabindex="-1">

                            <x-nav direction="vertical" class="space-y-0 divide-y divide-whisper border-b border-b-whisper">
                                <x-nav.mobile-link href="{{ route('home') }}">
                                    <span>{{ __('Acceuil') }}</span>
                                    <x-lucide-arrow-right class="w-5 h-5" />
                                </x-nav.mobile-link>

                                <div>
                                    <div class="w-full px-4 py-2.5 inline-flex items-center justify-between border-b border-whisper">
                                        <span class="uppercase">{{ __('À propos') }}</span>
                                        <x-lucide-chevron-down class="w-5 h-5" />
                                    </div>
                                    <ul class="ml-4 border-l border-whisper divide-y divide-whisper">
                                        <x-nav.mobile-link href="{{ route('whoWeAre') }}">
                                            <span>{{ __('Qui sommes-nous?') }}</span>
                                            <x-lucide-arrow-right class="w-5 h-5" />
                                        </x-nav.mobile-link>
    
                                        <x-nav.mobile-link href="{{ route('secretaryWords') }}">
                                            <span>{{ __('Mot de la secrétaire exécutive') }}</span>
                                            <x-lucide-arrow-right class="w-5 h-5" />
                                        </x-nav.mobile-link>
    
                                        <x-nav.mobile-link href="{{ route('decrees') }}">
                                            <span>{{ __('Textes reglémentaires') }}</span>
                                            <x-lucide-arrow-right class="w-5 h-5" />
                                        </x-nav.mobile-link>
                                    </ul>
                                </div>

                                <x-nav.mobile-link href="{{ route('becomeExpert.index') }}">
                                    <span>{{ __('Devenir expert') }}</span>
                                    <x-lucide-arrow-right class="w-5 h-5" />
                                </x-nav.mobile-link>

                                <x-nav.mobile-link href="{{ route('contactExpert.index') }}">
                                    <span>{{ __('Contacter un expert') }}</span>
                                    <x-lucide-arrow-right class="w-5 h-5" />
                                </x-nav.mobile-link>

                                <x-nav.mobile-link href="{{ route('news.index') }}">
                                    <span>{{ __('Actualités') }}</span>
                                    <x-lucide-arrow-right class="w-5 h-5" />
                                </x-nav.mobile-link>

                                <x-nav.mobile-link href="{{ route('contacts') }}">
                                    <span>{{ __('Contacts') }}</span>
                                    <x-lucide-arrow-right class="w-5 h-5" />
                                </x-nav.mobile-link>
                            </x-nav>

                        </div>
                        
                    </div>
                </div>
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
                <x-nav.custom-link href="{{ route('contactExpert.index') }}">{{ __('Contacter un expert') }}</x-nav.custom-link>
                <x-nav.custom-link href="{{ route('news.index') }}">{{ __('Actualités') }}</x-nav.custom-link>
                <x-nav.custom-link href="{{ route('contacts') }}">{{ __('Contacts') }}</x-nav.custom-link>
            </x-nav>
        </div>
    </div>

</header>
