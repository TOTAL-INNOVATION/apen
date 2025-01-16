<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\Approval\StoreFile;
use App\Enums\ApprovalTypeEnum;
use App\Http\Requests\Identity\FirstStepRequest;
use App\Http\Requests\Identity\FourthStepRequest;
use App\Http\Requests\Identity\SecondStepRequest;
use App\Http\Requests\Identity\ThirdStepRequest;
use Illuminate\Support\Facades\Storage;

class ApprovalIdentityService
{
    public function updateUser(FirstStepRequest $request): void
    {
        $user = $request->user();
        $approval = $user->approval;

        $user->update($request->validated());
        $approval->update(['view' => 'pages.approvals.identity.second']);
    }

    public function saveSecondStep(SecondStepRequest $request): bool
    {
        $path = app(StoreFile::class)->handle(
            $request->file('identity_photo')
        );
        
        if (!$path) return false;

        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;
        if ($approval->identity_photo) {
            Storage::disk('public')->delete(
                str($approval->identity_photo)->replace(
                    'storage/',
                    ''
                )
            );
        }

        $data = [
            ...$request->only([
                'country_of_residence',
                'commercial_register'
            ]),
            'identity_photo' => $path,
            'view' => 'pages.approvals.identity.third',
        ];


        return $approval->update($data);
    }

    public function saveThirdStep(ThirdStepRequest $request): void
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;
        
        $approval->update([
            ...$request->validated(),
            'view' => $approval->type === ApprovalTypeEnum::CATEGORY_C ?
            'pages.approvals.identity.fourth': 'pages.approvals.addresses'
        ]);
    }
    
    /**
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function saveFourthStep(FourthStepRequest $request): void
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;

        if ($approval->type !== ApprovalTypeEnum::CATEGORY_C)
            abort(403);

        $approval->update([
            ...$request->validated(),
            'view' => 'pages.approvals.addresses',    
        ]);
    }
}
