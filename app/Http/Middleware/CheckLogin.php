<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!isset($_COOKIE['token'])) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('not_login', 401);
            } else {
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
