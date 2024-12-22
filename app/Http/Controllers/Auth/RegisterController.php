<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $user = User::create(
            $request->validated()
        );
        auth()->login($user);
        event(new Registered($user));

        return to_route('verification.notice');
    }
}
