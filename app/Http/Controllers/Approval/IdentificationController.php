<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Http\Requests\Identity\FirstStepRequest;
use App\Http\Requests\Identity\SecondStepRequest;
use App\Http\Requests\Identity\ThirdStepRequest;
use App\Services\ApprovalIdentityService;
use Illuminate\Http\RedirectResponse;

class IdentificationController extends Controller
{
    public function __construct(
        public ApprovalIdentityService $service
    ) {}

    public function firstStep(FirstStepRequest $request): RedirectResponse
    {
        $this->service->updateUser($request);

        return back();
    }

    public function secondStep(SecondStepRequest $request): RedirectResponse
    {
        if (!$this->service->saveSecondStep($request)) {
            return back()->with(
                'error',
                'messages.approval.identification.failed.secondStep',
            );
        }

        return back();
    }

    public function thirdStep(ThirdStepRequest $request): RedirectResponse
    {
        $this->service->saveThirdStep($request);

        return back();
    }

}
