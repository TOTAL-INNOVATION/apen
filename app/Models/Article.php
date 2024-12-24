<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasUlids;

    public const CONTENTS_FOLDER = 'articles';

    protected $fillable = [
        'slug',
        'title',
        'cover',
        'content_path',
        'published_at',
    ];

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
