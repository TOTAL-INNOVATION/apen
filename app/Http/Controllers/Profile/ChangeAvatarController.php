<?php

namespace App\Http\Controllers\Profile;

use App\Actions\Profile\UpdateUserAvatar;
use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangeAvatarRequest;
use Illuminate\Http\RedirectResponse;

class ChangeAvatarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ChangeAvatarRequest $request): RedirectResponse
    {
        $xFromPanel = $request->header('X-FROM-PANEL');
        $updated = app(UpdateUserAvatar::class)->handle($request); 

        if (!$updated) {
            return $xFromPanel ? back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.profile.avatar.failed'),
            ]) : back()->with('error', 'messages.profile.avatar.failed');
        }

        return $xFromPanel ? back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.profile.avatar.succeeded'),
        ]) : back()->with('success', 'messages.profile.avatar.succeeded');
    }
}
