<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Requests\Approval\DomainRequest;
use App\Models\Approval;

class SaveDomain
{
    public function handle(DomainRequest $request): void
	{
		$approval = $request->getApproval();
		$approval->load('domains');
		$nextView = $this->getNextView($approval);
		$approval->domains()->create([
			...$request->validated(),
			'rank' => $approval->domains->count() + 1,
		]);

		$approval->update(['view' => $nextView]);
	}

	/**
	 * Get the next view to render
	 * 
	 * `Note:` $totalDomains equals to total domaines
	 * before the one that is about to get stored.
	 */
	protected function getNextView(Approval $approval): ApprovalFormsEnum
	{
		$totalSectors = $approval->total_sectors;
		$totalDomains = $approval->domains->count();

		if ($totalSectors === 1 || $totalDomains === $totalSectors - 1) {
			return ApprovalFormsEnum::ATTACHMENTS;
		}

		if ($totalDomains === 0) {
			return ApprovalFormsEnum::DOMAINS_SECOND;
		}

		return ApprovalFormsEnum::DOMAINS_THIRD;
		
	}
}
