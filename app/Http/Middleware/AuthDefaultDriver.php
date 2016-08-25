<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthDefaultDriver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $driver
     * @return mixed
     */
    public function handle($request, Closure $next, $driver = null)
    {
        Auth::setDefaultDriver($driver);

        return $next($request);
    }
}
