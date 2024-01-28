<?php

namespace App\Http\Controllers;

use App\Models\Revisor;
use App\Models\Docente;
use App\Models\User;
use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateDocenteRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.index');
    }

    // Mostrar Docentes
    public function indexDocente()
    {
        // Todos los usuarios son docentes
        $docentes = User::all();
        return view('admins.indexDocente',compact('docentes'));
    }

    // Mostra la pagina de crear Docente
    public function createDocente()
    {
        return view('admins.createDocente');
    }

    // Almacenar el Docente
    public function storeDocente(StoreDocenteRequest $request)
    {        
        // Crear Usuario
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
        $docente = new Docente;
        $docente->user_id = $user->id;
        $docente->save();

        return redirect()->route('admins.indexDocente')->with('mensaje', 'Docente agregado con exito');
    }

    // Mostrar datos del Docente en el CRUD
    public function showDocente(Docente $docente)
    {
        $docente = User::find($docente->user_id);

        return view('admins.showDocente', compact('docente'));
    }

    // Muestra la vista para editar el docente 
    public function editDocente(Docente $docente)
    {
        $docente = User::find($docente->user_id);
        return view('admins.editDocente', compact('docente'));
    }

    // Para el Editar de Docente
    public function updateDocente(UpdateDocenteRequest $request, Docente $docente)
    {
        $user = User::find($docente->user_id);
        // Actualizar docente
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'codigo' => $request->codigo,
            'categoria' => $request->categoria,
            'grado_academico' => $request->grado_academico,
        ]);

        return redirect()->route('admins.indexDocente')->with('mensaje', 'Docente modificado con exito');
    }

    // Eliminar Docente
    public function destroyDocente(Docente $docente)
    {
        User::find($docente->user_id)->delete();
        return back()->with('mensaje', 'Docente eliminado con exito');
    }

     # Función para llamar a asingarRoles
     public function asignarRoles()
     {
        $users = User::all();
        return view('admins.asignarRoles',compact('users'));
     }

     # Función para cambiar el rol de un Docente
    public function updateRole(UpdateAdminRequest $request)
    {
        $user = User::find($request->id);
                

        // Si el rol actual es Docente y se cambia a Revisor, entonces se tiene que crear un nuevo revisor
        if($user->rol === "Docente" && $request->rol === "Docente,Revisor"){            
            $revisor = new Revisor;
            $revisor->user_id = $user->id;
            $revisor->save();
        }

        // Si el rol actual es Docente y se cambia a Admin entonces se tiene que crear un nuevo admin
        if($user->rol === 'Docente' && $request->rol === 'Docente,Revisor,Administrador'){
            $revisor = new Revisor;
            $revisor->user_id = $user->id;
            $revisor->es_presidente = 1;
            $revisor->save();
        }

        // Si el rol actual es Revisor y se cambia a Docente entonces se tiene que eliminar el revisor
        if($user->rol === 'Docente,Revisor' && $request->rol === 'Docente'){
            Revisor::where('user_id',$user->id)->first()->delete();
        }

        // Si el rol actual es Revisor y se cambia a Admin entonces se tiene asignar como presidente
        if($user->rol === 'Docente,Revisor' && $request->rol === 'Docente,Revisor,Administrador'){
            $revisor = Revisor::where('user_id',$user->id)->first();
            $revisor->es_presidente = 1;
            $revisor->save();
        }

        // Si el rol actual es Admin y se cambia a Docente entonces se tiene que eliminar el revisor (admin)
        if($user->rol === 'Docente,Revisor,Administrador' && $request->rol === 'Docente'){
            Revisor::where('user_id',$user->id)->first()->delete();
        }

        // Si el rol actual es Admin y se cambia a Revisor entonces se tiene que eliminar si es presidente
        if($user->rol === 'Docente,Revisor,Administrador' && $request->rol === 'Docente,Revisor'){
            $revisor = Revisor::where('user_id',$user->id)->first();
            $revisor->es_presidente = 0;
            $revisor->save();
        }

        // Guardar el nuevo rol del usuario
        $user->rol = $request->rol;
        $user->save();   
        
        return redirect()->route('admins.asignarRoles');        
    }
}
