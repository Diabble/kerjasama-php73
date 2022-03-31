<?php

namespace App\Http\Middleware;

use Closure;

class Ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $levels)
    {
        if (auth()->user()->level != $levels){
            abort(403, 'Anda tidak punya akses!!');
        }
        return $next($request);
    }
}
