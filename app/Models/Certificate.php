<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }
}