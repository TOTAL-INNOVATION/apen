<?php

namespace App\Models;

use App\Services\ArticleService;
use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasUlids, SearchFilter;

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

    public function loadContent(): void
    {
        $this->content = Storage::disk('public')->get(
            $this->content_path,
        );
    }

    protected static function booted(): void
    {
        static::deleted(function(self $article) {

            ArticleService::deleteCover($article);

            Storage::disk('public')->delete(
                $article->content_path,
            );
            
        });
    }
}
