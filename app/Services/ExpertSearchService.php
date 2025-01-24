<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\ApprovalStatusEnum;
use App\Models\ExpertSearch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ExpertSearchService extends BaseFilterService
{
	public string $model = ExpertSearch::class;

	public array $searchAttributes = ['structure'];

	public array $sortByAttributes = ['structure', 'marked_as_read', 'created_at'];

	public array $with = ['user'];

    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }

	public function find(string $id): ?ExpertSearch
	{
		return ExpertSearch::find($id);
	}

}
