<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check if user login or not .. if not will return it to login page
        if (!Auth::check()) {
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
