<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\FinalRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

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
			$this->deleteFile($signaturePath);
			throw ValidationException::withMessages([
                'cv' => __('messages.approval.uploadFailed'),
            ]);
		}

		if (!$signaturePath) {
			$this->deleteFile($cvPath);
			throw ValidationException::withMessages([
                'signature' => __('messages.approval.uploadFailed'),
            ]);
		}
		$approval = $request->getApproval();
		$approval->update([
			'cv' => $cvPath,
			'signature' => $signaturePath
		]);
	}

	public function deleteFile(?string $path): void
	{
		if (!$path) return;

		Storage::disk('public')->delete(
			str($path)->replace('storage/', '')
		);
	}
}
