<?php

namespace App\Models;

use App\Enums\{ActivitySectorEnum, ApprovalTypeEnum, ExpertStatusEnum};
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};

class Approval extends Model
{
    use HasUlids;
    
    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'type' => ApprovalTypeEnum::class,
            'expert_status' => ExpertStatusEnum::class,
            'activity_sector' => ActivitySectorEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function society(): HasOne
    {
        return $this->hasOne(Society::class);
    }
}
