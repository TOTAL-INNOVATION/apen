<?php

namespace App\Actions\Handlers;

use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail
{
	public static function handle(User $user, string $url): MailMessage
	{
		$firstname = $user->firstname;

		return (new MailMessage)
		->subject(__('Confirmer mon inscription'))
		->view('mails.auth.verify', compact('firstname', 'url'));
	}
}
