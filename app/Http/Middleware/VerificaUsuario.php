<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        //Funcionamiento de middleware (ESCRIBIR CODIGO AQUI)

        //Verificar si la sesion esta activa
        if(!Auth::check()){
            return redirect()->route('registro')
            ->with('error','Se debe iniciar sesion o registrarse');
        }

        //Si la sesion esta iniciada el usuario puede acceder
        return $next($request);
    }
}
