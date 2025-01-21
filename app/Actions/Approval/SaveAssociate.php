<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\AssociateRequest;
use Illuminate\Validation\ValidationException;

class SaveAssociate
{
    public function handle(AssociateRequest $request): void
	{
		$path = app(StoreFile::class)->handle(
			$request->file('approval')
		);

		if (!$path) {
            throw ValidationException::withMessages([
                'approval' => __('messages.approval.uploadFailed'),
            ]);
        }

		$approval = $request->getApproval();
		$approval->associates()->create([
			...$request->validated(),
			'society_id' => $approval->society->id,
			'approval' => $path,
		]);

	}
}
