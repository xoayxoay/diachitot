<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lever
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ( Auth::check() && Auth::user()->lever == 3 && $_SERVER['REQUEST_URI'] == '/project/superadmin' )
        {
            return $next($request);
        }

        else if ( Auth::check() && Auth::user()->lever == 2 && $_SERVER['REQUEST_URI'] == '/project/admins' )
        {
            return $next($request);
        }

        else if ( Auth::check() && Auth::user()->lever == 1 && $_SERVER['REQUEST_URI'] == '/project/customers' )
        {
            return $next($request);
        }

        return redirect('/');

    }
}
