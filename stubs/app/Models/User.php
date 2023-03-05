<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use HasUuid;

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public string $label = 'name';

    public string $section = 'Users';

    public array  $searchable = ['name', 'email'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_logged_in_at' => 'datetime',
        'invited_at' => 'datetime',
        'joined_at' => 'datetime',
        'last_activity' => 'datetime',
    ];

    public function route($id): string
    {
        return route('admin.users.show', ['user' => $id]);
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function invite(): HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'invited_by');
    }
}
