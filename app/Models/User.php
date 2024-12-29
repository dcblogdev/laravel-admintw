<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use HasRoles;
    use HasUuid;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'image',
        'is_office_login_only',
        'is_active',
        'email_verified_at',
        'last_logged_in_at',
        'two_fa_active',
        'two_fa_secret_key',
        'invited_by',
        'invited_at',
        'joined_at',
        'invite_token',
        'last_activity',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_logged_in_at' => 'datetime',
            'invited_at' => 'datetime',
            'joined_at' => 'datetime',
            'last_activity' => 'datetime',
            'two_fa_active' => 'boolean',
            'is_active' => 'boolean',
            'is_office_login_only' => 'boolean',
        ];
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function route(string $id): string
    {
        return route('admin.users.show', ['user' => $id]);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', 1);
    }

    /**
     * @return HasOne<User, User>
     */
    public function invite(): HasOne
    {
        /** @var HasOne<User, User> */
        return $this->hasOne(User::class, 'id', 'invited_by');
    }
}
