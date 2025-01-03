<?php

namespace App\Models;

use App\Services\DecreeService;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Decree extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'type',
        'size',
        'doc_path',
    ];

    protected static function booted(): void
    {
        static::deleted(fn(Decree $decree) => (
            DecreeService::deleteDoc($decree)
        ));
    }
}
