<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Statement\{StoreRequest, UpdateRequest};
use App\Http\Resources\StatementResource;
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
        if (!$this->service->create($request)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.statement.create.failed'),
            ]);
        }

        return to_route('communiques.index')->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.statement.create.succeeded'),
        ]);

    }

    public function edit(string $id): RedirectResponse|Response
    {
        $statement = $this->service->find($id);

        if (!$statement) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.statement.update.failed'),
            ]);
        }

        $statement->loadContent();

        return inertia()->render(
            'statements/edit',
            [
                'statement' => new StatementResource($statement)
            ]
        );
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $statement = $this->service->find($id);

        if (!$statement) {
            return to_route('communiques.index')->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.statement.update.failed'),
            ]);
        }

        $this->service->update($request, $statement);

        return to_route('communiques.index')->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.statement.update.succeeded'),
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        $statement = $this->service->find($id);

        if (!$statement) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.statement.delete.failed'),
            ]);
        }

        $statement->delete();

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.statement.delete.succeeded'),
        ]);
    }
}
