<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Decree\{StoreRequest, UpdateRequest};
use App\Http\Resources\DecreeResource;
use App\Services\DecreeService;
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
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Update the specified decree in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified decree from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
