<?php

namespace App\Models;

use App\Models\Roles\HasRoles;
use App\Models\Traits\HasUuid;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasUuid;
    use HasRoles;
    use SoftDeletes;
    use HasApiTokens;

    protected     $guarded    = [];
    protected     $hidden     = ['remember_token'];
    public string $label      = 'name';
    public string $section    = 'Users';
    public array  $searchable = ['name', 'email'];

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
