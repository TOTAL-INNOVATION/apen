<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\Approval\StoreFile;
use App\Enums\ApprovalFormsEnum;
use App\Enums\ApprovalTypeEnum;
use App\Http\Requests\Identity\FirstStepRequest;
use App\Http\Requests\Identity\FourthStepRequest;
use App\Http\Requests\Identity\SecondStepRequest;
use App\Http\Requests\Identity\ThirdStepRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ApprovalIdentityService
{
    public function updateUser(FirstStepRequest $request): void
    {
        $user = $request->user();
        $approval = $user->approval;

        $user->update($request->validated());
        $approval->update([
            'view' => ApprovalFormsEnum::IDENTITY_STEP_TWO
        ]);
    }

    public function saveSecondStep(SecondStepRequest $request): void
    {
        $path = app(StoreFile::class)->handle(
            $request->file('identity_photo')
        );
        
        if (!$path) {
            throw ValidationException::withMessages([
                'identity_photo' => 'messages.approval.uploadFailed',
            ]);
        };

        /**
         * @var \App\Models\User
         */
        $user = $request->user();
        /**
         * @var \App\Models\Approval
         */
        $approval = $user->approval;
        
        if ($user->identity_photo) {
            Storage::disk('public')->delete(
                str($user->identity_photo)->replace(
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
            'view' => $approval->type === ApprovalTypeEnum::CATEGORY_A ?
            ApprovalFormsEnum::ADDRESSES : ApprovalFormsEnum::IDENTITY_STEP_THREE,
        ];


        $approval->update($data);
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
            ApprovalFormsEnum::IDENTITY_STEP_FOUR: ApprovalFormsEnum::ADDRESSES
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
            'view' => ApprovalFormsEnum::ADDRESSES,    
        ]);
    }
}
