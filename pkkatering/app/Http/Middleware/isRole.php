<?php

namespace App\Http\Middleware;

use Closure;

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
        if(auth()->user()->hasRole($role))
        {
            return $next($request);
        }
        
        return redirect()->route('dashboard');
    }
}
