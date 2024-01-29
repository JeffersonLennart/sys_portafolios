<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Config;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rol): Response
    {    

        // Recuperar el rol del usuario ya previamente autenticado        
        $rol_actual = $request->session()->get('rol');

        // Verificar si la ruta a la que quiere acceder corresonde con el rol con el que esta logeado
        if($rol_actual === $rol && str_contains(auth()->user()->rol, $rol)){
            Config::set('adminlte', require config_path("adminlte_{$rol}.php"));
            return $next($request); 
        }
        
        // Si el usuario esta autenticado, le damos logout
        if (auth()->check()) 
            auth()->logout();        
        return redirect('login');
    }
}
