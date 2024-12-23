<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;

class ResetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $token) : View
    {
        if (Cookie::get('reset-email'))
            Cookie::forget('reset-email');

        return view(
            'pages.auth.password.newPassword',
            compact('token')
        );
    }
}
