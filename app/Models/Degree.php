<?php
namespace App\Models;

use App\Enums\DegreeLevelEnum;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Degree extends Model
{

    use HasUlids;

    public $guarded = ['id'];

    public function casts(): array
    {
        return [
            'level' => DegreeLevelEnum::class,
        ];
    }

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }

    protected static function booted(): void
    {
        static::deleted(function(self $degree) {
            Storage::disk('public')->delete(
                $degree->file,
            );
        });
    }
}
