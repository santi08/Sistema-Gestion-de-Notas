<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
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
         $guard = 'admin';
        $usuario = \Auth::guard($guard)->user();

        if ($usuario->rolAdministrador() || $usuario->rolCoordinador()) {

             return $next($request);

        }else{

           
        abort(403);
        }
    }
}
