<?php

namespace App\Http\Controllers\Auth\Password;

use App\Actions\NewPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\NewPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class NewPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NewPasswordRequest $request): RedirectResponse
    {
        $status = app(NewPassword::class)->handle($request);

        return $status === Password::PASSWORD_RESET ?
        to_route('login.view')->with('success', $status) :
        back()->with('error', $status);
    }
}
