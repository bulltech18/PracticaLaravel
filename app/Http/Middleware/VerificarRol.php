<?php

namespace App\Http\Middleware;

use Closure;

class VerificarRol
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
        if($request->rol == 1)
        {
            abort(403, "No se puede carnal perdoname neta es mi trabajo");
        }
        return $next($request);
    }
}
