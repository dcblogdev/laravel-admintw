<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasUuid;

    public $incrementing = false;

    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];
}
