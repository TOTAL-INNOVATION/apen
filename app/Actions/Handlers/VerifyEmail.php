<?php

namespace App\Actions\Handlers;

use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Nette\Utils\Random;

class VerifyEmail
{
	public static function handle(User $user, string $url): MailMessage
	{
		$firstname = $user->firstname;

		if (!$user->added_by_admin)
		{
			return (new MailMessage)
			->subject(__('Confirmer mon inscription'))
			->view(
				'mails.auth.verify.registered',
				compact('firstname', 'url')
			);	
		}

		$password = Random::generate(14);
		$user->update(['password' => $password]);

		return (new MailMessage)
		->subject(__('Compte créé'))
		->view(
			'mails.auth.verify.addedByAdmin',
			compact('firstname', 'password', 'url')
		);
	}
}
