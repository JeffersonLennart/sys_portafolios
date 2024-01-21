<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // if($request->session()->get('role') === null)
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && $request->session()->get('rol') === 'Docente') {
                return redirect(RouteServiceProvider::HOME_DOCENTE);
            }
            if (Auth::guard($guard)->check() && $request->session()->get('rol') === 'Revisor') {
                return redirect(RouteServiceProvider::HOME_REVISOR);
            }
            if (Auth::guard($guard)->check() && $request->session()->get('rol') === 'Admin') {
                return redirect(RouteServiceProvider::HOME_ADMIN);
            }
        }

        return $next($request);
    }
}
