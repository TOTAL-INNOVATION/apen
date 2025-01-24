<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpertSearchResource;
use App\Services\ExpertSearchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class ExpertSearchController extends Controller
{
    public function __construct(
        public ExpertSearchService $service,
    ) {}

    public function index(Request $request): Response
    {
        $expertSearches = $this->service->getAll($request);

        return inertia()->render(
            'expert-searches',
            [
                'expert_searches' => ExpertSearchResource::collection(
                    $expertSearches
                )
            ]
        );
    }

    public function delete(string $id): RedirectResponse
    {
        $expertSearch = $this->service->find($id);
        if (!$expertSearch) {
            return back();
        }
        $expertSearch->delete();

        return back()->with(
            'flash',
            [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.expert_searches.deleted')
            ]
        );
    }
}
