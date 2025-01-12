<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\RoleEnum;
use App\Notifications\Auth\SendResetPasswordLink;
use App\Notifications\Auth\SendVerificationEmail;
use App\Traits\SearchFilter;
use Illuminate\Contracts\Auth\{CanResetPassword, MustVerifyEmail};
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    ];

    public function getFullnameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

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

    public function approval(): HasOne
    {
        return $this->hasOne(Approval::class);
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new SendVerificationEmail);
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new SendResetPasswordLink($token));
    }
}
