<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Statement;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class StatementService extends BaseFilterService
{
    public string $model = Statement::class;

	public array $searchAttributes = ['title'];

	public array $sortByAttributes = ['published_at', 'created_at', 'updated_at'];

	public function getAll(Request $request): LengthAwarePaginator
	{
		return $this->filterAllItem($request);
	}
}
