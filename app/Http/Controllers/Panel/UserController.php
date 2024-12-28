<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class UserController extends Controller
{

    public function __construct(
        public UserService $service
    ) {}
    /**
     * Display a listing of the users.
     */
    public function index(Request $request): Response
    {
        $users = UserResource::collection(
            $this->service->getAll($request)
        );

        return inertia()->render(
            'users/index',
            compact('users')
        );
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(): Response
    {
        return inertia()->render(
            'users/create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $user = $this->service->create($request);

        if (!$user)
        {
            return back()
            ->with('error', 'messages.users.create.failed');
        }

        return to_route('utilisateurs.index')
        ->with('success', 'messages.users.create.succeed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
