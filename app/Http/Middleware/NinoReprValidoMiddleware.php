<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NinoReprValidoMiddleware
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
        if(!Auth::user()->rol->ninos()->find($request->route('nino_id')))
            return redirect()->route('inicio');
        return $next($request);
    }
}
