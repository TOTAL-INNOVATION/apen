<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Subscriber;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class SubscriberService extends BaseFilterService
{
    public string $model = Subscriber::class;

	public array $searchAttributes = ['email'];

	public array $sortByAttributes = ['email', 'created_at'];

    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }
}
