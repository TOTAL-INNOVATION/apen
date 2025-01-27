<?php

namespace App\Models;

use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUlids, SearchFilter;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'subject',
        'message',
        'marked_as_read',
    ];

    public function casts(): array
    {
        return [
            'marked_as_read' => 'boolean',
        ];
    }

    public function markAsRead(): void
    {
        $this->marked_as_read = true;
        $this->save();
    }
}
