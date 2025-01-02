<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasUlids;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'subject',
        'message',
        'marked_as_read',
    ];

    public function markAsRead(): void
    {
        $this->marked_as_read = true;
        $this->save();
    }
}
