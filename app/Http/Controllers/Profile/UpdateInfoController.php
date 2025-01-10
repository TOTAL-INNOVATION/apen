<?php

namespace App\Http\Controllers\Profile;

use App\Actions\Profile\UpdateUserInfo;
use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateInfoRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UpdateInfoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateInfoRequest $request): JsonResponse|RedirectResponse
    {
        $expectJson = $request->expectsJson();
        $changed = app(UpdateUserInfo::class)->handle($request);

        if (!$changed) {
            return $expectJson ? response()->json([
                'flash' => [
                    'type' => FlashEnum::ERROR,
                    'message' => __('messages.profile.info.failed'),
                ],
            ]) : back()->with('error', 'messages.profile.info.failed');
        }

        $request->user()->sendEmailVerificationNotification();

        return $expectJson ? response()->json([
            'flash' => [
                'type' => FlashEnum::SUCCESS,
                'message' => __('messages.profile.info.succeeded'),
            ],
        ]) : back()->with('success', 'messages.profile.info.succeeded');
    }
}
