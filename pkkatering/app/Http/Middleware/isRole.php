<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class isRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::user())
        {
            return route('login');
        }
        
        if(Auth::user()->hasRole($role))
        {
            return $next($request);
        }
        
        return route('dashboard');
    }
}
