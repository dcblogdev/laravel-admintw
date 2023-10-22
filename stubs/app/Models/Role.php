<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasUuid;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];
}
