<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $guarded    = [];
    public    $timestamps = false;
    public    $table      = 'permission_role';

    protected $casts = [
        'permission_id' => 'string',
        'role_id'       => 'string'
    ];
}
