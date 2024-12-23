<?php

namespace App\Actions\Handlers;

use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword
{
	public static function handle(string $token): MailMessage
	{

		$url = route('password.reset', $token);

		return (new MailMessage)
		->subject(__('Réinitialiser mon mot de passe'))
		->view('mails.auth.resetPassword', compact('url'));
	}
}
