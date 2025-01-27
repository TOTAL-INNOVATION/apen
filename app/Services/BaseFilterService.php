<?php

declare (strict_types = 1);

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BaseFilterService
{

    public string $model;

    public array $with = [];

    public array $searchAttributes = ['name'];

    public array $sortByAttributes = ['name'];

    /**
     * where clauses.
     * The attribute name is the key.
     * The value is an array of two item(The first item is the operator,
     * it can be =, <, >, <=, >=, and the second item is the condition value.)
     * @var array<string, array<string, string>>
     */
    public array $conditions = [];

    /**
     * Get datatable filter attributes from current request
     * @param \Illuminate\Http\Request $request
     * @return array<string>
     */
    protected function getFilterAttributes(Request $request): array
    {
        $search = $request->query('q');
        $sortBy = $request->query('sort_by');
        $sortOrder = $request->query('sort_order');
        $length = $request->query('length');

        if (!$sortBy || !in_array($sortBy, $this->sortByAttributes)) {
            $sortBy = 'created_at';
        }

        if (!$sortOrder || !in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc';
        }

        if (!$length || (int) $length < 1) {
            $length = 15;
        }

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
    protected function filterAllItem(Request $request): LengthAwarePaginator
    {
        list($search, $sortBy, $sortOrder, $length) = $this->getFilterAttributes($request);
        
        $query = count($this->with) ? $this->model::with($this->with) : $this->model::query();

        if ($search) {
            return $this->applyWhereClauses(
                $query->search($search, $this->searchAttributes)
            )
                ->orderBy($sortBy, $sortOrder)
                ->paginate($length);
        }

        return $this->applyWhereClauses(
            $query->orderBy($sortBy, $sortOrder)
        )
            ->paginate($length);
    }

    public function applyWhereClauses(Builder $query): Builder
    {
        foreach ($this->conditions as $attribute => $condition) {
            $query->where(
                $attribute,
                $condition[0], $condition[1]
            );
        }

        return $query;
    }
}
