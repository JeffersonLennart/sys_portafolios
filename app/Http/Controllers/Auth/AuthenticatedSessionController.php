<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        // Recuperar user de la bd por el email
        $user = User::where('email', $request->email)->first();        
        // Verificar el rol escogido le corresponde
        if(str_contains($user->rol, $request->rol)){
            switch ($request->rol) {
                case "Docente":
                    $request->session()->put('rol', 'Docente');                    
                    return redirect()->intended(RouteServiceProvider::HOME_DOCENTE);                 
                    break;
                case "Revisor":
                    $request->session()->put('rol', 'Revisor');                    
                    return redirect()->intended(RouteServiceProvider::HOME_REVISOR);  
                    break;
                case "Administrador":
                    $request->session()->put('rol', 'Admin');                    
                    return redirect()->intended(RouteServiceProvider::HOME_ADMIN);  
                    break;            
            }                    
        }
        // Si escogio un rol que no le corresponde no le permite el acceso y retornar el login
        throw ValidationException::withMessages([
            'rol' => 'El usuario no tiene permisos de ' . $request->rol,
        ]);
        return redirect('login');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->forget('rol');

        return redirect('/');
    }
}
