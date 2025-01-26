<?php

namespace App\Models;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'status' => TransactionStatusEnum::class,
        ];
    }

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }
}
