<?php

declare(strict_types=1);

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasTenant
{
    public static function bootHasTenant(): void
    {
        if (auth()->check()) {
            $tenantId = auth()->user()->tenant_id;

            static::creating(function (Model $model) use ($tenantId) {
                $model->tenant_id = $tenantId;
            });

            static::addGlobalScope('tenant', function (Builder $builder) use ($tenantId) {
                $builder->where('tenant_id', $tenantId);
            });
        }
    }
}
