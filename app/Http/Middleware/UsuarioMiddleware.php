<?php

namespace SisVideo\Http\Middleware;

use Closure;

class UsuarioMiddleware
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

        $usuario_actual=\Auth::user();
        if($usuario_actual->idRol!=3){
            return redirect()->route('mensaje');
        }
        return $next($request);
    }
}
