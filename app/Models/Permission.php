<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasUuid;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'label',
        'module',
        'guard_name',
    ];

    protected $primaryKey = 'id';

    /**
     * @return array<string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
        ];
    }
}
