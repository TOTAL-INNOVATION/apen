<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class UserService extends BaseFilterService
{
	public string $model = User::class;

	public array $searchAttributes = ['firstname', 'lastname', 'email'];

	public array $sortByAttributes = ['firstname', 'lastname', 'email', 'role'];

	public array $conditions = [
		'role' => ['!=', RoleEnum::SUPER_ADMIN]
	];

	public function getAll(Request $request): LengthAwarePaginator
	{
		return $this->filterAllItem($request);
	}

	public function create(StoreRequest $request): ?User
	{
		$user = User::create([
			...$request->validated(),
			'added_by_admin' => true,
		]);

		if (!$user)
			return null;
		
		$user->sendEmailVerificationNotification();

		return $user;
	}

	public function update(UpdateRequest $request, User $user)
	{
		return $user->update(
			$request->validated()
		);
	}

	public function find(string $id): ?User
	{
		return User::find($id);
	}

}
