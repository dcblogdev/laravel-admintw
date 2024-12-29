<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\HasUuid;
use Database\Factories\NotificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    /** @use HasFactory<NotificationFactory> */
    use HasFactory;

    use HasUuid;

    protected $fillable = [
        'title',
        'assigned_to_user_id',
        'assigned_from_user_id',
        'link',
        'viewed',
        'viewed_at',
    ];

    protected static function newFactory(): NotificationFactory
    {
        return NotificationFactory::new();
    }

    /**
     * @return BelongsTo<User, Notification>
     */
    public function assignedTo(): BelongsTo
    {
        /** @var BelongsTo<User, Notification> */
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    /**
     * @return BelongsTo<User, Notification>
     */
    public function assignedFrom(): BelongsTo
    {
        /** @var BelongsTo<User, Notification> */
        return $this->belongsTo(User::class, 'assigned_from_user_id');
    }
}
