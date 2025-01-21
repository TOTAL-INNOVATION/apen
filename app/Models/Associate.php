<?php

namespace App\Models;

use App\Enums\QualificationEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Associate extends Model
{

    use HasUlids;

    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'qualification' => QualificationEnum::class,
        ];
    }

    public function getFullnameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function society(): BelongsTo
    {
        return $this->belongsTo(Society::class);
    }
}
