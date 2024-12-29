<x-mail-layout>

    <x-slot:title>{{ __('Votre compte a été créé') }}</x-slot:title>


    <table class="body-wrap">
        <tr>
            <td></td>
            <td>
                <div class="w-fit mx-auto mb-2">
                    <img src="{{ $message->embed(public_path('logo.png')) }}" class="logo" alt="APEN">
                </div>
            </td>
        </tr>
    </table>

    <table class="body-wrap">
        <tr>
            <td></td>
            <td class="container" bgcolor="#FFFFFF">

                <!-- content -->
                <div class="content">
                    <table>
                        <tr>
                            <td>
                                <h1 class="text-center">{{ __('Votre compte a été créé') }}</h1>
                                <p class="lead">{{ __('Bonjour :firstname!', ['firstname' => $firstname]) }}</p>
                                <p class="lead">
                                    {{ __('Vous venez d\'être ajouté(e) par un administrateur. Vous trouverez ci-dessous votre mot de passe de connexion. Et surtout, n\'oubliez pas d\'activer votre compte en cliquant sur le bouton vert.') }}
                                </p>
                                <div class="my-4">
                                    <p class="lead"><span>{{ __('Mot de passe:') }}</span>
                                        <strong>{{ $password }}</strong></p>
                                </div>

                                <div class="my-6" style="display: flex; justify-content: center;">
                                    <a href="{{ $url }}" class="btn">{{ __('Activer mon compte') }}</a>
                                </div>

                            </td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <td>
                                <hr style="width: 100px; border-color: #8d8d8d;" class="mx-auto" />
                                <p class="text-center" style="margin-top: 1.5rem; color: #8d8d8d;">
                                    {{ __('Si vous oubliez d\'activer votre compte, elle sera supprimer au bout de 3 jours.') }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

</x-mail-layout>
