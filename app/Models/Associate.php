<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Associate extends Model
{
    protected $fillable = [
        'society_id',
        'firstname',
        'lastname',
        'role',
        'qualification',
        'approval',
    ];

    public function society(): BelongsTo
    {
        return $this->belongsTo(Society::class);
    }
}
