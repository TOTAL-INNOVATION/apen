<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Degree extends Model
{

    use HasUlids;

    public $guarded = ['id'];

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }
}
