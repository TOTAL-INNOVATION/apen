<?php

namespace App\Http\Controllers\Approval;

use App\Actions\Approval\DefineChoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Approval\ChoiceRequest;
use Illuminate\Http\RedirectResponse;

class ChoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ChoiceRequest $request): RedirectResponse
    {
        app(DefineChoice::class)
        ->handle($request);

        return back();
    }
}
