<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\ApprovalStatusEnum;
use App\Models\Approval;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ApprovalService extends BaseFilterService
{
	public string $model = Approval::class;

	public const DEFAULT_FILTER_FIELDS = ['type', 'status', 'geographic_region'];

	public array $searchAttributes = self::DEFAULT_FILTER_FIELDS;

	public array $sortByAttributes = self::DEFAULT_FILTER_FIELDS;

	public array $conditions = [
		'status' => ['!=', ApprovalStatusEnum::IN_PROGRESS]
	];

	public array $with = ['user'];

    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }
}
