<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\FinalRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

class Complete
{
    public function handle(FinalRequest $request)
	{
		$cvPath = app(StoreFile::class)->handle(
			$request->file('cv')
		);
		$signaturePath = app(StoreFile::class)->handle(
			$request->file('signature')
		); 

		if (!$cvPath) {
			throw ValidationException::withMessages([
                'cv' => __('messages.approval.uploadFailed'),
            ]);
		}

		if (!$signaturePath) {
			throw ValidationException::withMessages([
                'cv' => __('messages.approval.uploadFailed'),
            ]);
		}
		$approval = $request->getApproval();
		$approval->update([
			'cv' => $cvPath,
			'signature' => $signaturePath
		]);
	}
}
