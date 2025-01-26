<?php

namespace App\Models;

use App\Actions\DeleteFile;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'starts_at' => 'date',
            'ends_at' => 'date',
        ];
    }

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }

    protected static function booted(): void
    {
        static::deleted(function(self $certificate) {
            app(DeleteFile::class)->handle(
                $certificate->file
            );
        });
    }
}
