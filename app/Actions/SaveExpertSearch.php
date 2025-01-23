<?php

declare(strict_types=1);

namespace App\Actions;

use App\Http\Requests\ContactExpertRequest;

class SaveExpertSearch
{
    public function handle(ContactExpertRequest $request): void
	{
		$request
		->user()
		->expertSearches()
		->create([
			...$request->validated(),
			'mobile' => $request->getMobile(),
			'tel' => $request->getTel(),
		]);
	}
}
