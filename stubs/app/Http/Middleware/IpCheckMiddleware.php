<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IpCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $approved = [];
            $ips = Setting::where('key', 'ips')->value('value');
            if ($ips !== null) {
                $ips = json_decode($ips, true);

                foreach ($ips as $row) {
                    $approved[] = $row['ip'];
                }

                if (! in_array($request->ip(), $approved, true) && auth()->user()->is_office_login_only === true) {
                    flash('Sorry, the system cannot be accessed from your location.')->warning();

                    Auth::guard()->logout();

                    return redirect()->route('login');
                }
            }
        }

        return $next($request);
    }
}
