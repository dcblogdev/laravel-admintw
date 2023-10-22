<?php

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
    use HasFactory;
    use HasRoles;
    use HasUuid;
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public string $label = 'name';

    public string $section = 'Users';

    /**
     * @var string[]
     */
    public array $searchable = ['name', 'email'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_logged_in_at' => 'datetime',
        'invited_at' => 'datetime',
        'joined_at' => 'datetime',
        'last_activity' => 'datetime',
    ];

    public function route(string $id): string
    {
        return route('admin.users.show', ['user' => $id]);
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', 1);
    }

    public function invite(): HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'invited_by');
    }
}
