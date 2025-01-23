<?php

namespace App\Http\Controllers;

use App\Actions\SaveExpertSearch;
use App\Http\Requests\ContactExpertRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactExpertController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactExpertRequest $request): RedirectResponse
    {
        app(SaveExpertSearch::class)->handle($request);

        return back()
        ->with(
            'success',
            'messages.expert_search_sent'
        );
    }
}
