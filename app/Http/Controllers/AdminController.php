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
    public function dashboard()
    {
        return view('admins.index');
    }

    /*
        **************************************************
            CONTROLADORES PARA LA ASIGNACIÓN DE ROLES
        ****************************************************
    */
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
