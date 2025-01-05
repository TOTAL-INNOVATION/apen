<?php

namespace App\Models;

use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class FlashInfo extends Model
{
    use HasUlids, SearchFilter;

    protected $fillable = [
        'title',
        'active',
    ];

    public function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }

}
