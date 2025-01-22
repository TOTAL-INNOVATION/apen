<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApprovalResource;
use App\Services\ApprovalService;
use Illuminate\Http\Request;
use Inertia\Response;

class ApprovalController extends Controller
{
    public function __construct(
        public ApprovalService $service,
    ) {}

    public function index(Request $request): Response
    {
        $approval = $this->service->getAll($request);

        return inertia()->render(
            'approvals/index',
            [
                'approvals' => ApprovalResource::collection(
                    $approval
                )
            ]
        );
    }
}
