<?php

declare (strict_types = 1);

namespace App\Actions\Approval;

use App\Enums\ApprovalTypeEnum;
use App\Http\Requests\Approval\ChoiceRequest;

class DefineChoice
{
    public function handle(ChoiceRequest $request): void
    {
		/**
		 * @var \App\Models\Approval
		 */
        $approval = $request->user()->approval;

		$type = $request->input('type');

		$data = [
			'type' => $type,
			'view' => 'pages.approvals.identity.first',
			'total_steps' => ApprovalTypeEnum::getTotalSteps($type)
		];

		if ($approval) {
			$approval->update($data);
			return;
		}

		$request->user()
		->approval()
		->create($data);
    }
}
