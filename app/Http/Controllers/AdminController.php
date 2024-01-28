<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Docente;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

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
        $docentes = Docente::orderBy('id', 'asc')->get();
        return view('admins.indexDocente',compact('docentes'));
    }

    // Mostra la pagina de crear Docente
    public function createDocente()
    {
        
    }

    // Almacenar el Docente
    public function storeDocente(StoreAdminRequest $request)
    {
        //
    }

    // Mostrar datos del Docente en el CRUD
    public function showDocente(Docente $docente)
    {
        //
    }

    // Muestra la vista para editar el docente 
    public function editDocente(Docente $docente)
    {
        //
    }

    // Para el Editar de Docente
    public function updateDocente(UpdateAdminRequest $request, Docente $docente)
    {
        //
    }

    // Eliminar Docente
    public function destroyDocente(Docente $docente)
    {
        
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
        $user->rol = $request->rol;
        $user->save();           
        return redirect()->route('admins.asignarRoles');        
    }
}
