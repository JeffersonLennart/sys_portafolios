<?php

namespace App\Http\Controllers;

use App\Models\Revisor;
use App\Http\Requests\StoreRevisorRequest;
use App\Http\Requests\UpdateRevisorRequest;
use App\Models\Docente;
use App\Models\Portafolio;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('revisores.index');
    }

    /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE REVISORES EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Revisores
    public function index()
    {
        // Recuperar revisores
        $revisores = Revisor::all();
        return view('admins.revisores.index',compact('revisores'));
    }

    // Mostra la pagina de crear Revisor
    public function create()
    {
        return view('admins.revisores.create');
    }

    // Almacenar el Revisor
    public function store(StoreRevisorRequest $request)
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
            'rol' => 'Docente,Revisor'
        ]);
        
        // Crear Docente
        $docente = new Docente();
        $docente->user_id = $user->id;
        $docente->save();
        // Crear Revisor
        $revisor = new Revisor;
        $revisor->user_id = $user->id;
        $revisor->save();

        return redirect()->route('revisores.index')->with('mensaje', 'El Revisor '.$revisor->id.' ha sido agregado con exito');
    }

    // Mostrar datos del Revisor en el CRUD
    public function show(Revisor $revisore)
    {        
        $revisor = Revisor::find($revisore->id);
        return view('admins.revisores.show', compact('revisor'));
    }

    // Muestra la vista para editar el revisor 
    public function edit(Revisor $revisore)
    {
        $revisor = Revisor::find($revisore->id);
        return view('admins.revisores.edit', compact('revisor'));
    }

    // Para el Editar de Revisor
    public function update(UpdateRevisorRequest $request, Revisor $revisore)
    {
        $user = User::find($revisore->user_id);
        // Actualizar revisor
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'codigo' => $request->codigo,
            'categoria' => $request->categoria,
            'grado_academico' => $request->grado_academico,
        ]);

        return redirect()->route('revisores.index')->with('mensaje', 'El Revisor '.$revisore->id.' ha sido modificado con exito');
    }

    // Eliminar Revisor
    public function destroy(Revisor $revisore)
    {
        User::find($revisore->user_id)->delete();
        return back()->with('mensaje', 'El Revisor '.$revisore->id.' ha sido eliminado con exito');
    }


    /*
        **********************************************
            OTRAS FUNCIONES EN EL PANEL DE REVISOR
        **********************************************
    */

    // Función para revisar potafolios que le corresponden
    public function revisarPortafolios(){

      #obtenemos todos los portafolios que le corresponden al revisor
      //$revisorId = Auth::user()->id;
      $revisorId = Auth::user()->revisors->first()->id;      
      $portafolios = Portafolio::whereHas('cargaAcademica.docente.DocenteRevisor', function ($query) use ($revisorId) {$query->where('revisor_id', $revisorId);})->doesntHave('revisiones')->get();
      return view('revisores.portafolios.index',compact('portafolios'));

    }

    // Función para mostrar historial de revisiones
    public function historialRevisiones(){
      
      #obtenemos todas las revisiones que hizo en actual revisor
    //   $revisorId = Auth::user()->id;
      $revisorId = Auth::user()->revisors->first()->id;  
      $revisiones = Revision::where("revisor_id", $revisorId)->get();
      return view('revisores.revisiones.index',compact('revisiones'));

    }
}
