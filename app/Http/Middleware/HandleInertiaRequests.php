<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'layouts.panel';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user' => new UserResource($request->user()),
            'flash' => $request->session()->get('flash'),
        ]);
    }

    public function handle(Request $request, \Closure $next)
    {
        if ($request->user()->role === RoleEnum::EXPERT && $request->route()->getName() !== 'profile.index')
            abort(403);

        return parent::handle($request, $next);
    }
}
