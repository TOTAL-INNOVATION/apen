<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Services\MessageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class MessageController extends Controller
{

    public function __construct(
        public MessageService $service
    ) {}

    public function index(Request $request): Response
    {
        $messages = $this->service->getAll($request);
        
        return inertia()->render(
            'messages',
            ['messages' => MessageResource::collection($messages)],
        );
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $message = $this->service->find($id);
        
        if (!$message) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.messages.markedAsRead.failed'),
            ]);
        }
        
        $this->service->markAsRead($message);

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.messages.markedAsRead.succeeded'),
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        if (!$this->service->delete($id)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.messages.delete.failed'),
            ]);
        }

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.messages.delete.succeeded'),
        ]);
    }
}
