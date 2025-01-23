<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Enums\ApprovalStatusEnum;
use App\Http\Requests\Approval\FinalRequest;
use App\Models\Approval;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class Complete
{
    public function handle(FinalRequest $request): void
	{
		$cvPath = app(StoreFile::class)->handle(
			$request->file('cv')
		);

		if (!$cvPath) {
			throw ValidationException::withMessages([
                'cv' => __('messages.approval.uploadFailed'),
            ]);
		}

		$signaturePath = app(StoreFile::class)->handle(
			$request->file('signature')
		);

		if (!$signaturePath) {
			$this->deleteFile($cvPath);
			throw ValidationException::withMessages([
                'signature' => __('messages.approval.uploadFailed'),
            ]);
		}

		$approval = $request->getApproval();
		$this->deleteFilesIfExist($approval);
		
		$approval->update([
			'cv' => $cvPath,
			'signature' => $signaturePath,
			'status' => ApprovalStatusEnum::COMPLETED,
		]);
	}

	public function deleteFile(?string $path): void
	{
		if (!$path) return;

		Storage::disk('public')->delete(
			str($path)->replace('storage/', '')
		);
	}

	public function deleteFilesIfExist(Approval $approval): void
	{
		foreach (['cv', 'signature'] as $field) {
			$this->deleteFile(
				$approval->$field,
			);
		}
	}
}
