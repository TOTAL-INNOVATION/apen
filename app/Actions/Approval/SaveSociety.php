<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Requests\Approval\SocietyRequest;
use Illuminate\Validation\ValidationException;

class SaveSociety
{
    public function handle(SocietyRequest $request): void
	{
		$path = app(StoreFile::class)->handle(
			$request->file('status_file')
		);

		if (!$path) {
            throw ValidationException::withMessages([
                'status_file' => __('messages.approval.uploadFailed'),
            ]);
        }

		$approval = $request->getApproval();
		$approval->society()->updateOrCreate([
			...$request->validated(),
			'status_file' => $path,
		]);

		ApprovalFormsEnum::goToNext($approval);
	}
}
