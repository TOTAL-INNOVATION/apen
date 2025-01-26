<?php

namespace App\Models;

use App\Actions\DeleteFile;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasUlids;

    protected $guarded = ['id'];

    public function approval(): BelongsTo
    {
        return $this->belongsTo(Approval::class);
    }

    protected static function booted(): void
    {
        static::deleted(function(self $attachment) {
            app(DeleteFile::class)->handle(
                $attachment->file
            );
        });
    }
}
