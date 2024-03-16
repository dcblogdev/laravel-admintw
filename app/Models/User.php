<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasTenant;
use App\Models\Traits\HasUuid;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use HasRoles;
    use HasTenant;
    use HasUuid;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'tenant_id',
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

    public string $label = 'name';

    public string $section = 'Users';

    /**
     * @var array<string>
     */
    public array $searchable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
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

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', 1);
    }

    public function invite(): HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'invited_by');
    }

    public function tenant(): belongsTo
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function isOwner(): bool
    {
        return Tenant::where('owner_id', $this->id)->first() !== null;
    }
}
