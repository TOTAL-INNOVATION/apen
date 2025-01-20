<?php

declare (strict_types = 1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\CertificateRequest;
use Illuminate\Validation\ValidationException;

class SaveCertificate
{
    public function handle(CertificateRequest $request): void
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
		$approval->certificates()->create([
			...$request->validated(),
			'file' => $path,
		]);
    }
}
