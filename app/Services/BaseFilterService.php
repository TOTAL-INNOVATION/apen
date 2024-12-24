<?php

declare(strict_types=1);

namespace App\Services;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class BaseFilterService
{

    public string $model;

    public array $searchAttributes = ['name'];

    public array $sortByAttributes = ['name'];

    /**
     * Get datatable filter attributes from current request
     * @param \Illuminate\Http\Request $request
     * @return array<string>
     */
    protected function getFilterAttributes(Request $request) : array
    {
		$search = $request->query('q');
		$sortBy = $request->query('sort_by');
		$sortOrder = $request->query('sort_order');
        $length = $request->query('length');

        if (!$sortBy || !in_array($sortBy, $this->sortByAttributes))
			$sortBy = 'created_at';

		if (!$sortOrder || !in_array($sortOrder, ['asc', 'desc']))
			$sortOrder = 'asc';

        if (!$length || (int)$length < 1)
            $length = 15;

        return [
            $search,
            $sortBy,
            $sortOrder,
            $length,
        ];
    }

    /**
     * Get all items regardless entreprise it belongs to
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function filterAllItem(Request $request) : LengthAwarePaginator
    {
        list($search, $sortBy, $sortOrder, $length) = $this->getFilterAttributes($request);

        if ($search)
        {
            return $this->model::search($search, $this->searchAttributes)
            ->orderBy($sortBy, $sortOrder)
            ->paginate($length);
        }

        return $this->model::orderBy($sortBy, $sortOrder)
        ->paginate($length);
    }
}
