<?php

declare(strict_types=1);

namespace App\Actions\Profile;

use App\Http\Requests\Profile\UpdateInfoRequest;

class UpdateUserInfo
{
    public function handle(UpdateInfoRequest $request): bool
	{
		/**
		 * @var \App\Models\User $user
		 */
		$user = $request->user();

		if ($user->email !== $request->input('email'))
			$user->email_verified_at = null;
		
		return $user->forceFill(
			$request->validated()
		)->save();
	}
}
