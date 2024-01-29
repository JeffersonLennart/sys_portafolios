<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\DocenteRevisor;
use App\Models\Revisor;
use App\Models\Semestre;
use Database\Seeders\SemestreSeeder;
use Illuminate\Http\Request;

class DocenteRevisorController extends Controller
{
    
    /*
        ***********************************************************************
            FUNCIONES PARA LA ASIGNACIÓN DE REVISORES EN EL PANEL DE ADMIN
        ***********************************************************************
    */

    // Mostrar Asignaciones
    public function index()
    {
        // Recuperar asignaciones
        $asignaciones = DocenteRevisor::all();
        return view('admins.revisor_docentes.index',compact('asignaciones'));
    }

    // Mostra la pagina de crear la asignación
    public function create()
    {
        // Recuperar todos los revisores
        $revisores = Revisor::all();
        // Recuperar todos los docentes sin revisores
        $docentes = Docente::whereDoesntHave('revisores')->get();
        // Recuperar todos los semestres activos
        $semestres = Semestre::where('estado', 'Activo')->get();
        return view('admins.revisor_docentes.create',compact('revisores', 'docentes', 'semestres'));
    }

    // Almacenar la asignación
    public function store(Request $request)
    {        
        // Crear DocenteRevisor (Para que funciones importante en el Modelo los campos deben estar en $fillable)
        $asignacion = DocenteRevisor::create([
            'docente_id' => $request->docente_id,
            'revisor_id' => $request->revisor_id,            
            'semestre_id' => $request->semestre_id,            
        ]);

        return redirect()->route('revisor_docentes.index')->with('mensaje', 'La asignación '.$asignacion->id.' ha sido agregada con exito');
    }

    // Mostrar datos de la asignación
    public function show(DocenteRevisor $revisor_docente)
    {
        $asignacion = DocenteRevisor::find($revisor_docente->id);

        return view('admins.revisor_docentes.show', compact('asignacion'));
    }

    // Muestra la vista para editar la asignación
    public function edit(DocenteRevisor $revisor_docente)
    {
        $asignacion = DocenteRevisor::find($revisor_docente->id);
        // Recuperar todos los revisores
        $revisores = Revisor::all();
        // Recuperar todos los docentes sin revisores
        $docentes = Docente::whereDoesntHave('revisores')->get();
        // Recuperar todos los semestres activos
        $semestres = Semestre::where('estado', 'Activo')->get();

        return view('admins.revisor_docentes.edit', compact('asignacion', 'revisores', 'docentes', 'semestres'));
    }

    // Para Editar asignación
    public function update(Request $request, DocenteRevisor $revisor_docente)
    {
        $asignacion = DocenteRevisor::find($revisor_docente->id);
        // Actualizar semestre
        $asignacion->update([
            'docente_id' => $request->docente_id,
            'revisor_id' => $request->revisor_id,            
            'semestre_id' => $request->semestre_id, 
        ]);

        return redirect()->route('revisor_docentes.index')->with('mensaje', 'La asignación '.$asignacion->id.' ha sido modificada con exito');
    }

    // Eliminar asignación
    public function destroy(DocenteRevisor $revisor_docente)
    {
        DocenteRevisor::find($revisor_docente->id)->delete();
        return back()->with('mensaje', 'La asignación '.$revisor_docente->id.' ha sido eliminada con exito');
    }   

}
