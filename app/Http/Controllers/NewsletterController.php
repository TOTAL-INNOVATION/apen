<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NewsletterRequest $request): RedirectResponse
    {
        Subscriber::create(
            $request->validated(),
        );

        return back()->with(
            'success',
            'messages.subscibed_to_newsletter',
        );
    }
}
