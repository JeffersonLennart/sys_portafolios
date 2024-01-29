<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],                        
            'telefono' => ['sometimes', 'nullable', 'string', 'min:9', 'max:9'],
            'codigo' => ['sometimes', 'nullable', 'string', 'min:7', 'max:7'],
            'categoria' => ['sometimes', 'nullable', 'string', 'max:30'],
            'grado_academico' => ['sometimes', 'nullable', 'string', 'max:30'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'codigo' => $request->codigo,
            'categoria' => $request->categoria,
            'grado_academico' => $request->grado_academico,
        ]);

        // Crear Docente
        $docente = new Docente();
        $docente->user_id = $user->id;
        $docente->save();
        
        event(new Registered($user));

        Auth::login($user);

        // Por defecto el usuario es docente
        $request->session()->put('rol', 'Docente');
        
        return redirect(RouteServiceProvider::HOME_DOCENTE);
    }
}
