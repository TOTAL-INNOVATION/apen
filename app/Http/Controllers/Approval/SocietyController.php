<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveSociety;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\SocietyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SocietyRequest $request): RedirectResponse
    {
        app(SaveSociety::class)->handle($request);

        return back();
    }
}
