<?php

namespace App\Http\Middleware;

use Closure;

class VerficarEdad
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
        if($request->edad <= 15)
        {
            return abort(403, "No se permite");
        }
        return $next($request);
    }
}
