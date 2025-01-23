<?php

namespace App\Models;

use App\Enums\DomainTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpertSearch extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'expert_domain' => DomainTypeEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
