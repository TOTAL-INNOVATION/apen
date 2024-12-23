<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\SendLinkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class SendResetLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SendLinkRequest $request) : RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ?
            to_route('password.linkSent')
            ->withCookie(
                cookie()->forever('reset-email', $request->input('email'))
            ) : back()->with('error', $status);

    }
}
