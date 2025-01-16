<?php

namespace App\Models;

use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Statement extends Model
{
    use HasUlids, SearchFilter;

    protected $fillable = [
        'title',
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
}
