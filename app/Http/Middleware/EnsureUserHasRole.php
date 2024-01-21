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
        if($rol_actual === $rol){
            Config::set('adminlte', require config_path("adminlte_{$rol}.php"));
            return $next($request); 
        }
        
        // Si no lo corresponde, logearlo a su dashboard correspondiente
        // switch($rol_actual){
        //     case "Docente":                
        //         return redirect()->intended(RouteServiceProvider::HOME_DOCENTE);      
        //     case "Revisor":                
        //         return redirect()->intended(RouteServiceProvider::HOME_REVISOR);                                      
        //     case "Admin":                
        //         return redirect()->intended(RouteServiceProvider::HOME_ADMIN);                                      
        // }

        // Esto también es valido porque internamente lo maneja el middleware guest
        return redirect('login');
    }
}
