<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Models\User;
use App\Models\CargaAcademica;
use App\Models\Portafolio;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('docentes.index');
    }

    /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE DOCENTES EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Docentes
    public function index()
    {
        // Todos los usuarios son docentes
        $docentes = User::all();
        return view('admins.docentes.index',compact('docentes'));
    }

    // Mostra la pagina de crear Docente
    public function create()
    {
        return view('admins.docentes.create');
    }

    // Almacenar el Docente
    public function store(StoreDocenteRequest $request)
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

        return redirect()->route('docentes.index')->with('mensaje', 'El Docente '.$docente->id.' ha sido agregado con exito');
    }

    // Mostrar datos del Docente en el CRUD
    public function show(Docente $docente)
    {
        $docente = User::find($docente->user_id);

        return view('admins.docentes.show', compact('docente'));
    }

    // Muestra la vista para editar el docente 
    public function edit(Docente $docente)
    {
        $docente = User::find($docente->user_id);
        return view('admins.docentes.edit', compact('docente'));
    }

    // Para el Editar de Docente
    public function update(UpdateDocenteRequest $request, Docente $docente)
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

        return redirect()->route('docentes.index')->with('mensaje', 'El Docente '.$docente->id.' ha sido modificado con exito');
    }

    // Eliminar Docente
    public function destroy(Docente $docente)
    {
        User::find($docente->user_id)->delete();
        return back()->with('mensaje', 'El Docente '.$docente->id.' ha sido eliminado con exito');
    }   


     /*
        *********************************************
            OTRAS FUNCIONES DEL PANEL DE DOCENTE
        *********************************************
    */

    // Función para mostrar carga academica del docente
    public function cargaAcademica(){
        $docente_id = auth()->user()->id;
        $cargas_academicas = CargaAcademica::where('docente_id', $docente_id)->get();
        return view('docentes.cargaAcademica',compact('cargas_academicas'));
    }

    // Función para enviar un portafolio (debe seleccionar de que carga academica desea enviar el portafolio)
    public function enviarPortafolio(){
        $docente_id = auth()->user()->id;
        $cargas_academicas = CargaAcademica::where('docente_id', $docente_id)
                            ->whereNotIn('id', function($query) {
                                $query->select('carga_academica_id')->from('portafolios');
                            })
                            ->get();
        return view('docentes.enviarPortafolio',compact('cargas_academicas'));
    }

    // Función para mostrar los portafolios revisados
    public function portafoliosRevisados(){
        $docente_id = auth()->user()->id;
        $portafolios = Portafolio::whereHas('cargaAcademica', function ($query) use ($docente_id) {$query->where('docente_id', $docente_id);})->whereHas('revisiones')->get();
        return view('docentes.portafoliosRevisados',compact('portafolios'));
    }
}
