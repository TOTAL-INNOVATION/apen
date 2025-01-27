<?php

namespace App\Models;

use App\Actions\DeleteFile;
use App\Enums\ApprovalStatusEnum;
use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\RoleEnum;
use App\Notifications\Auth\SendResetPasswordLink;
use App\Notifications\Auth\SendVerificationEmail;
use App\Traits\SearchFilter;
use Illuminate\Contracts\Auth\{CanResetPassword, MustVerifyEmail};
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use HasFactory, Notifiable, HasUlids, SearchFilter;

    public const DEFAULT_AVATAR = 'defaults/avatar.svg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'firstname',
        'lastname',
        'email',
        'phone',
        'avatar',
        'password',
        'added_by_admin',
        'birthday',
        'birthplace',
        'gender',
        'marital_status',
        'identity_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => RoleEnum::class,
            'gender' => GenderEnum::class,
            'marital_status' => MaritalStatusEnum::class,
            'added_by_admin' => 'boolean',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class);
    }

    public function expertSearches(): HasMany
    {
        return $this->hasMany(ExpertSearch::class);
    }

    public function getApprovalAttribute(): ?Approval
    {
        $statues = [ApprovalStatusEnum::IN_PROGRESS, ApprovalStatusEnum::COMPLETED];
        $approval = $this->approvals()->latest()->first();

        return !in_array($approval->status, $statues) ? null : $approval;
    }

    public function getFullnameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new SendVerificationEmail);
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new SendResetPasswordLink($token));
    }

    protected static function booted(): void
    {
        static::deleted(function(self $user) {
            $action = app(DeleteFile::class);
            
            if ($user->avatar !== self::DEFAULT_AVATAR) {
                $action->handle(
                    $user->avatar
                );
            }

            if ($user->identity_photo) {
                $action->handle(
                    $user->identity_photo
                );
            }
        });
    }
}
