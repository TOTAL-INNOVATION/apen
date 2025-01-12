<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Identity\FirstStepRequest;

class ApprovalIdentityService
{
    public function updateUser(FirstStepRequest $request): void
    {
        $user = $request->user();
        $approval = $user->approval;

        $user->update($request->validated());
        $approval->update(['view' => 'pages.approvals.identity.second']);
    }
    
}
