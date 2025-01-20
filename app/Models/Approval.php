<?php

namespace App\Models;

use App\Enums\{
    ActivitySectorEnum,
    ApprovalFormsEnum,
    ApprovalTypeEnum,
    ExpertStatusEnum,
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasOne,
    HasMany,
    HasManyThrough
};

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
            'view' => ApprovalFormsEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function degree(): HasOne
    {
        return $this->hasOne(Degree::class);
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    public function society(): HasOne
    {
        return $this->hasOne(Society::class);
    }

    public function associates(): HasManyThrough
    {
        return $this->hasManyThrough(
            Associate::class,
            Society::class
        );
    }
}
