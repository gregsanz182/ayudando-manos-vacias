<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EsAdminMiddleware
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
        if (Auth::check())
        {
            if (Auth::user()->rol_type == 'App\Admin') 
            {
                return $next($request);
            }
        }
        return redirect()->route('inicio');
    }
}
