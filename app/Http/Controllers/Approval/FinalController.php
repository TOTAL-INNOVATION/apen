<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\Complete;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\FinalRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FinalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FinalRequest $request): RedirectResponse
    {
        app(Complete::class)->handle($request);

        return to_route('payment.index');

    }
}
