<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Decree\{StoreRequest, UpdateRequest};
use App\Http\Resources\DecreeResource;
use App\Services\DecreeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class DecreeController extends Controller
{

    public function __construct(
        public DecreeService $service
    ) {}

    /**
     * Display a listing of the decrees.
     */
    public function index(Request $request): Response
    {
        $decrees = DecreeResource::collection(
            $this->service->getAll($request)
        );
        
        return inertia()->render(
            'decrees/index',
            compact('decrees'),    
        );
    }

    /**
     * Store a newly created decree in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $decree = $this->service->create($request);

        if (!$decree) {
            return to_route('decrets.index')
            ->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.decree.create.failed'),
            ]);
        }

        return to_route('decrets.index')
        ->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.decree.create.succeeded'),
        ]); 
    }

    /**
     * Update the specified decree in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $decree = $this->service->find($id);

        if (!$decree) {
            return to_route('decrets.index')
            ->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.decree.edit.notFound'),
            ]);
        }

        if (!$this->service->update($request, $decree)) {
            return to_route('decrets.index')
            ->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.decree.update.failed'),
            ]);
        }
     
        return to_route('decrets.index')
        ->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.decree.update.succeeded'),
        ]);
    }

    /**
     * Remove the specified decree from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        if (!$this->service->delete($id)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.decree.delete.failed'),
            ]);
        }

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.decree.delete.succeeded'),
        ]);
    }
}
