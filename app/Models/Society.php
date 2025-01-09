<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Society extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function associates(): HasMany
    {
        return $this->hasMany(Associate::class);
    }
}
