<?php

namespace App\Models;

use App\Enums\ApprovalTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approval extends Model
{
    use HasUlids;

    protected $fillable = [
        'user_id',
        'type',
    ];

    public function casts(): array
    {
        return [
            'type' => ApprovalTypeEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
