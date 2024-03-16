<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotOwner
{
    public function handle(Request $request, Closure $next): ?Response
    {
        if (auth()->check()) {

            setPermissionsTeamId(auth()->user()->tenant_id);

            if (! auth()->user()->isOwner()) {
                return redirect(route('dashboard'));
            }
        }

        return $next($request);
    }
}
