<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Services\SubscriberService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class SubscriberController extends Controller
{
    public function __construct(
        public SubscriberService $service
    ){}

    public function index(Request $request): Response
    {
        $subscribers = $this->service->getAll($request);

        return inertia()->render(
            'subscribers',
            [
                'subscribers' => SubscriberResource::collection($subscribers)
            ]
        );
    }

    public function destroy(string $id): RedirectResponse
    {
        $subscriber =  Subscriber::find($id);

        if (!$subscriber) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.subscribers.delete.failed')
            ]);
        }

        $subscriber->delete();

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.subscribers.delete.succeeded')
        ]);
    }
}
