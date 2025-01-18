<?php

namespace App\Models;

use App\Enums\TrainingLevelEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'level' => TrainingLevelEnum::class,
        ];
    }

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }
}
