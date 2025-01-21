<?php

namespace App\Models;

use App\Enums\DomainTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'type' => DomainTypeEnum::class,
        ];
    }

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }
}
