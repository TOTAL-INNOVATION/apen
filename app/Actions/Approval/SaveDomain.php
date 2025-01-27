<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Http\Requests\Approval\DomainRequest;
use App\Models\Approval;
use App\Models\Domain;

class SaveDomain
{
    public function handle(DomainRequest $request): void
	{
		$approval = $request->getApproval();
		$rank = $this->getCurrentDomainRank($approval);
		$domain = $this->getCurrentDomainFor($rank, $approval);

		if (!$domain) {
			$approval->domains()->create([
				...$request->validated(),
				'rank' => $rank,
			]);
		} else {
			$domain->update($request->validated());
		}

		ApprovalFormsEnum::goToNext($approval);
	}

	public function getCurrentDomainFor(int $rank, Approval $approval): ?Domain
	{
		return $approval
		->domains()
		->where('rank', $rank)
		->first();
	}

	protected function getCurrentDomainRank(Approval $approval): int
	{
		return match ($approval->view) {
			ApprovalFormsEnum::DOMAINS_FIRST => 1,
			ApprovalFormsEnum::DOMAINS_SECOND => 2,
			ApprovalFormsEnum::DOMAINS_THIRD => 3,
		};
	}
}
