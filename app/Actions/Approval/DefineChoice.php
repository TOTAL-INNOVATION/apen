<?php

declare (strict_types = 1);

namespace App\Actions\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Enums\ApprovalTypeEnum;
use App\Http\Requests\Approval\ChoiceRequest;
use App\Models\Approval;

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
			'view' => ApprovalFormsEnum::IDENTITY_STEP_ONE,
			'total_steps' => ApprovalTypeEnum::getTotalSteps($type)
		];

		if ($approval) {
			$approval->update($data);
			return;
		}

		Approval::create([
			...$data,
			'user_id' => auth()->id(),
		]);
    }
}
