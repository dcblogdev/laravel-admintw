<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public static function booted()
    {
        static::creating(function (Model $model) {
            // Set attribute for new model's primary key (ID) to an uuid.
            $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
        });
    }
}
