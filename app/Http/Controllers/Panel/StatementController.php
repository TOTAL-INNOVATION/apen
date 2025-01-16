<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statement\{StoreRequest, UpdateRequest};
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use App\Services\StatementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class StatementController extends Controller
{

    public function __construct(
        public StatementService $service,
    ){}

    public function index(Request $request): Response
    {
        $statements = $this->service->getAll($request);

        return inertia()->render(
            'statements/index',
            [
                'statements' => StatementResource::collection(
                    $statements
                ),
            ]
        );
    }

    public function create(): Response
    {
        return inertia()->render(
            'statements/create'
        );
    }

    public function store(StoreRequest $request): RedirectResponse
    {

    }

    public function edit(Statement $statement): Response
    {
        return inertia()->render(
            'statements/edit',
            [
                'statement' => new StatementResource($statement)
            ]
        );
    }

    public function update(UpdateRequest $request, Statement $statement): RedirectResponse
    {

    }

    public function delete(Statement $statement): RedirectResponse
    {

    }
}
