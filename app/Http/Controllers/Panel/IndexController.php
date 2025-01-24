<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Services\PanelService;
use Illuminate\Http\Request;
use Inertia\Response;

class IndexController extends Controller
{

    public function __construct(
        public PanelService $service
    ) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $stats = [
            'totals' => $this->service->totals(),
        ];

        return inertia()->render(
            'home',
            compact('stats'),
        );
    }
}
