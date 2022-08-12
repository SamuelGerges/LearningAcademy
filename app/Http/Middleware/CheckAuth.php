<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $guard
     * @return mixed
     */


    // TODO This middleware To Check Admin Authenticate or Not

    public function handle($request, Closure $next,$guard = null)
    {
        if(!auth()->guard($guard)->check())
        {
            return redirect(route('admin.auth.login'));
        }
        return $next($request);
    }
}
