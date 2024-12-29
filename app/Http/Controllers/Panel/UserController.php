<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
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
     * Store a newly created user in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $user = $this->service->create($request);

        if (!$user) {
            return back()
                ->with(
                    'flash',
                    [
                        'type' => FlashEnum::ERROR,
                        'message' => __('messages.users.create.failed'),
                    ]
                );
        }

        return to_route('utilisateurs.index')
            ->with(
                'flash',
                [
                    'type' => FlashEnum::SUCCESS,
                    'message' => __('messages.users.create.succeed'),
                ]
            );
    }


    /**
     * Update the specified user in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $user = $this->service->find($id);

        if (!$user || $isNotAllowed = !self::canPerformOnAdmin($user)) {
            return to_route('utilisateurs.index')
            ->with(
                'flash',
                [
                    'type' => FlashEnum::ERROR,
                    'message' => $isNotAllowed ? 
                    __('messages.unauthorized') :
                    __('messages.users.update.failed'),
                ]
            );
        }

        $this->service->update($request, $user);

        return to_route('utilisateurs.index')
        ->with(
            'flash',
            [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.users.update.success'),
            ]
        );

    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = $this->service->find($id);

        if (!$user || $isNotAllowed = !self::canPerformOnAdmin($user)) {
            return back()->with(
                'flash',
                [
                    'type' => FlashEnum::ERROR,
                    'message' => $isNotAllowed ?
                    __('messages.unauthorized') :
                    __('messages.users.delete.failed'),
                ]
            );
        }

        $user->delete();

        return back()->with(
            'flash',
            [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.users.delete.success'),
            ]
        );
    }

    /**
     * Check if authenticated user is allowed to perform update/delete action
     * on specified user
     * @param \App\Models\User $user
     * @return bool
     */
    protected static function canPerformOnAdmin(User $user): bool
    {
        if ($user->role === RoleEnum::EXPERT)
            return true;
        return $user->role === RoleEnum::ADMIN && user()->role === RoleEnum::SUPER_ADMIN;
    }
}
