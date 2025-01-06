<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\FlashInfo\{StoreRequest, UpdateRequest};
use App\Models\FlashInfo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class FlashInfoService extends BaseFilterService
{
    public array $searchAttributes = ['title'];

    public array $sortByAttributes = ['active', 'created_at', 'updated_at'];

    public string $model = FlashInfo::class;

    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }

    public function create(StoreRequest $request): void
    {
        FlashInfo::create(
            $request->validated(),
        );
    }

    public function update(UpdateRequest $request, FlashInfo $flashInfo): void
    {
        $flashInfo->update(
            $request->validated(),
        );
    }

    public function delete(string $id): bool
    {
        $flashInfo = $this->find($id);
        
        if (!$flashInfo) return false;
        
        return $flashInfo->delete();
    }

    public function find(string $id): ?FlashInfo
    {
        return FlashInfo::find($id);
    }

}
