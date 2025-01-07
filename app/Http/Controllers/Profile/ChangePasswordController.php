<?php

namespace App\Http\Controllers\Profile;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ChangePasswordRequest $request): RedirectResponse
    {
        /**
         * @var \App\Models\User $user
         */
        $user = $request->user();
        $xFromPanel = $request->header('X-FROM-PANEL');

        $changed = $request->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        if (!$changed) {
            return $xFromPanel ? back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.profile.password.failed'),
            ]) : back()->with('error', 'messages.profile.password.failed');
        }

        return $xFromPanel ? back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.profile.password.succeeded'),
        ]) : back()->with('success', 'messages.profile.password.succeeded');
    }
}
