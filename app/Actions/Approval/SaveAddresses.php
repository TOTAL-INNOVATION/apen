<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Http\Requests\Approval\AddressRequest;

class SaveAddresses
{
    public function handle(AddressRequest $request)
	{
		/**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;
		
		$approval->update([
			...$request->validated(),
			'mobile' => $request->getMobile(),
			'tel' => $request->getTel(),
			'view' => 'pages.approvals.degrees',
		]);
	}
}
