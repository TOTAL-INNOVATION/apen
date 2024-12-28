<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        if (user()->role === RoleEnum::EXPERT)
            return to_route('home');
        
        return to_route('panel');
    }

    public function logout(Request $request): JsonResponse|RedirectResponse
    {
        /**
         * @var RoleEnum
         */
        $userRole = $request->user()->role;
        
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($userRole === RoleEnum::EXPERT)
        {
            return to_route('login.view');
        }

        return response()->json([
            'message' => 'loggedOut',
        ]);
    }
}
