<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request): RedirectResponse
    {
        $message = Message::create(
            $request->validated(),
        );

        if (!$message) {
            return back()->with('error', 'messages.contact.failed');
        }

        return back()->with('success', 'messages.contact.succeeded');
    }
}
