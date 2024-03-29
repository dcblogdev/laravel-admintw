<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasUuid;

    protected $fillable = [
        'key',
        'value',
    ];
}
