<x-mail-layout>

    <x-slot:title>{{ __('Confirmez votre inscription') }}</x-slot:title>


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
                                <h1 class="text-center">{{ __('Confirmez votre inscription') }}</h1>
                                <p class="lead">{{ __('Bonjour :firstname!', ['firstname' => $firstname]) }}</p>
                                <p class="lead">{{ __('Votre inscription sur la plateforme a été un succès. Pour poursuivre avec votre candidature, veuillez cliquer sur le bouton ci-dessous pour confirmer la création de votre compte.') }}</p>
                                
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
                                <p class="text-center" style="margin-top: 1.5rem; color: #8d8d8d;">{{ __('Si vous n\'êtes pas l\'auteur de cette inscription sur la plateforme, veuillez l\'ignorer. Le compte utilisant votre adresse email sera supprimé au bout de 3 jours.') }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

</x-mail-layout>
