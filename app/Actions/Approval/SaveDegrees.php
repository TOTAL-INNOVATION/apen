<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\DegreeRequest;
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

		$approval->degree()->updateOrCreate([
			...$request->validated(),
			'file' => $path,
		]);

		$approval->update(['view' => 'pages.approvals.training']);
	}
}
