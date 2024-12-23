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
                                <h1 class="text-center">{{ __('Réinitialisation du mot de passe') }}</h1>
                                <p class="lead">{!! __('Bonjour! Ce message vous ait été envoyé suite à votre requête de réinitialisation. Veuillez cliquer sur le bouton <strong>Réinitialiser mon mot de passe</strong> pour définir un nouveau mot de passe.') !!}</p>
								<p class="lead">{!! __('<strong>Note</strong>: Veuillez ignorer ce message si vous n\'en êtes pas l\'auteur.') !!}</p>
                                
                                <div class="my-6" style="display: flex; justify-content: center;">
                                    <a href="{{ $url }}" class="btn">{{ __('Réinitialiser mon mot de passe') }}</a>
                                </div>
        
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

</x-mail-layout>
