<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasTenant;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasTenant;
    use HasUuid;

    protected $fillable = [
        'tenant_id',
        'key',
        'value',
    ];
}
