<?php

namespace App\Models;

use App\Actions\DeleteFile;
use App\Enums\{
    ActivitySectorEnum,
    ApprovalFormsEnum,
    ApprovalStatusEnum,
    ApprovalTypeEnum,
    ExpertStatusEnum,
};
use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasOne,
    HasMany,
    HasManyThrough
};
use Illuminate\Support\Collection;

class Approval extends Model
{
    use HasUlids, SearchFilter;
    
    protected $guarded = ['id'];
    
    public function casts(): array
    {
        return [
            'type' => ApprovalTypeEnum::class,
            'expert_status' => ExpertStatusEnum::class,
            'activity_sector' => ActivitySectorEnum::class,
            'view' => ApprovalFormsEnum::class,
            'has_been_public_agent' => 'boolean',
            'status' => ApprovalStatusEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function degree(): HasOne
    {
        return $this->hasOne(Degree::class);
    }

    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function society(): HasOne
    {
        return $this->hasOne(Society::class);
    }

    public function associates(): HasManyThrough
    {
        return $this->hasManyThrough(
            Associate::class,
            Society::class,
        );
    }

    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function hasAddressDefined(): bool
    {
        return $this->geographic_region &&
        $this->mobile && 
        ($this->region || $this->address);
    }

    public function getCurrentDomain(): ?Domain
    {
        $rank = match ($this->view) {
            ApprovalFormsEnum::DOMAINS_THIRD => 3,
            ApprovalFormsEnum::DOMAINS_SECOND => 2,
            default => 1
        };
        
        return $this
        ->domains()
        ->where('rank', $rank)
        ->first();
    }

    /**
     * Get an array of the approval
     * related files paths
     * 
     * @return Collection
     */
    public function getFiles(): Collection
    {
        $paths = collect();

        if ($this->cv) $paths->push($this->cv);
        if ($this->signature) {
            $paths->push(
                $this->signature
            );
        }

        if ($this->degree) {
            $paths->push(
                $this->degree->file
            );
        }

        $this
        ->certificates
        ->each(function(Certificate $certificate) use ($paths) {
            $paths->push(
                $certificate->file
            );
        });

        $this
        ->associates
        ->each(function(Associate $associate) use ($paths) {
            $paths->push(
                $associate->approval
            );
        });

        if ($this->society) {
            $paths->push(
                $this->society->status_file
            );
        }

        $this->attachments->each(function(Attachment $attachment) use($paths) {
            $paths->push(
                $attachment->file
            );
        });

        return $paths;
    }
}
