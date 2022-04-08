<?php

namespace App\Models\Roles;

use App\Models\Traits\HasUuid;
use Database\Factories\Roles\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $guarded = [];

    protected static function newFactory(): RoleFactory
    {
        return RoleFactory::new();
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission): bool
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return !!$permission->intersect($this->permissions)->count();
    }

    public function givePermissionTo(Permission $permission): Model
    {
        return $this->permissions()->save($permission);
    }

    public function syncPermissions(array $permissions)
    {
        $this->permissions()->sync($permissions);
    }
}
