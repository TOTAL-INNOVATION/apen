<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Message;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class MessageService extends BaseFilterService
{
    public string $model = Message::class;

    public const DEFAULT_FILTER_FIELDS = ['email', 'created_at', 'updated_at'];

    public array $searchAttributes = self::DEFAULT_FILTER_FIELDS;

    public array $sortByAttributes = [...self::DEFAULT_FILTER_FIELDS, 'marked_as_read'];

    public function getAll(Request $request): LengthAwarePaginator
    {
        return $this->filterAllItem($request);
    }

    public function markAsRead(Message $message): void
    {
        $message->marked_as_read = true;

        $message->save();
    }

    public function delete(string $id): bool
    {
        $message = $this->find($id);
        if (!$message) return false;

        return (bool)$message->delete();
    }

    public function find(string $id): ?Message
    {
        return Message::find($id);
    }

}
