<?php

namespace App\Http\Middleware;

use Closure;

class Comum
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
        if (Auth::user()->permissao == 'Administrador' || Auth::user()->permissao == 'Comum') {
            return $next($request);
        }
        else return redirect('/login');
    }
}
