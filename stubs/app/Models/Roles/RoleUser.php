<?php

namespace App\Models\Roles;

use Database\Factories\Roles\RoleUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $guarded    = [];
    public    $timestamps = false;
    public    $table      = 'role_user';

    protected $casts = [
        'role_id' => 'string',
        'user_id' => 'string'
    ];

    protected static function newFactory(): RoleUserFactory
    {
        return RoleUserFactory::new();
    }
}
