<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\SaveDegrees;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\DegreeRequest;
use Illuminate\Http\RedirectResponse;

class DegreeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DegreeRequest $request): RedirectResponse
    {
        app(SaveDegrees::class)->handle($request);
        
        return back();
    }
}
