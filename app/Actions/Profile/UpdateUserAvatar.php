<?php

declare(strict_types=1);

namespace App\Actions\Profile;

use App\Http\Requests\Profile\ChangeAvatarRequest;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateUserAvatar
{
    public function handle(ChangeAvatarRequest $request): bool
	{
		/**
		 * @var User $user
		 */
		$user = $request->user();
		
		$path = $this->storeAvatar(
			$request->file('avatar')
		);
		if (!$path) return false;

		if ($user->avatar !== User::DEFAULT_AVATAR) {
			Storage::disk('public')->delete(
				str_replace('storage/', '', $user->avatar)
			);
		}

		return $request->user()->update(['avatar' => $path]);
	}

	protected function storeAvatar(UploadedFile $file): string|null
	{
		$path = $file->store('avatars', ['disk' => 'public']);
		
		if (!$path) return null;

		return "storage/$path";
	}
}

