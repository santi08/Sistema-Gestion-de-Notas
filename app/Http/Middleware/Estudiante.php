<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard; 

class Estudiante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth){
        $this->auth= $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->estadoContrasena === 0){
            //return redirect()->route('admin.usuarios.asignaturasEstudiante');
            dd('si');
        }else{
          return $next($request);  
        }

        
    }
}
