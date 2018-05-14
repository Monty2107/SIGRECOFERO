<?php

namespace SIGRECOFERO\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::User()->cargo != "Administracion") {
              return redirect('/welcome');
            }
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
