<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Requests\Approval\DegreeRequest;
use App\Models\Degree;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class SaveDegrees
{
    public function handle(DegreeRequest $request): void
	{
		
		$path = app(StoreFile::class)->handle(
            $request->file('file')
        );

        if (!$path) {
            throw ValidationException::withMessages([
				'file' => __('messages.approval.uploadFailed'),
			]);
        }

		/**
		 * @var \App\Models\Approval
		 */
		$approval = $request->user()->approval;

		$this->deleteFileIfDegreeExist($approval->degree);

		$approval->degree()->updateOrCreate([
			...$request->validated(),
			'file' => $path,
		]);

		ApprovalFormsEnum::goToNext($approval);
	}

	public function deleteFileIfDegreeExist(?Degree $degree): void
	{
		if (!$degree) return;

		Storage::disk('public')->delete(
			str($degree->file)->replace(
				'storage/',
				''
			)
		);
	}
}
