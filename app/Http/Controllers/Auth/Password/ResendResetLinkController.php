<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResendResetLinkController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $email = $request->cookie('reset-email');
        if (!$email)
            return back()->with('error', 'passwords.resentFailed');

        $status = Password::sendResetLink(compact('email'));

        return $status === Password::RESET_LINK_SENT ?
        back()->with('success', $status) : 
        back()->with('error', $status);
    }
}
