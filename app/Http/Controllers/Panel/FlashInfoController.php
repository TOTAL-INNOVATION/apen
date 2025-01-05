<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlashInfo\{StoreRequest, UpdateRequest};
use App\Http\Resources\FlashInfoResource;
use App\Services\FlashInfoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class FlashInfoController extends Controller
{

    public function __construct(
        public FlashInfoService $service
    ) {}

    public function index(Request $request): Response
    {
        $infos = $this->service->getAll($request);

        return inertia()->render(
            'flash-info/index',
            ['infos' => FlashInfoResource::collection($infos)]
        );
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->create($request);
        
        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.flash_info.created')
        ]);
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $info = $this->service->find($id);

        if (!$info) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.flash_info.update.failed')
            ]);
        }

        $this->service->update($request, $info);

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.flash_info.update.succeeded')
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {

        if (!$this->service->delete($id)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.flash_info.delete.failed')
            ]);
        }

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.flash_info.delete.succeeded')
        ]);
    }
}
