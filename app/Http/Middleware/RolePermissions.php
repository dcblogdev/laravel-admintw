<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolePermissions
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check()) {
            setPermissionsTeamId(auth()->user()->tenant_id);
        }

        return $next($request);
    }
}
