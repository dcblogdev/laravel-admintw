<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\AuditTrailsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditTrail extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $guarded = [];

    protected static function newFactory(): AuditTrailsFactory
    {
        return AuditTrailsFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
