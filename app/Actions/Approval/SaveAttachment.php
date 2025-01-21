<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\AttachmentRequest;
use Illuminate\Validation\ValidationException;

class SaveAttachment
{
    public function handle(AttachmentRequest $request): void
	{
		$path = app(StoreFile::class)->handle(
            $request->file('file')
        );

        if (!$path) {
            throw ValidationException::withMessages([
                'file' => __('messages.approval.uploadFailed'),
            ]);
        }

		$approval = $request->getApproval();
		$approval->attachments()->create([
			...$request->validated(),
			'file' => $path,
		]);
	}
}
