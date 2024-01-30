<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargaAcademicaRequest;
use App\Models\CargaAcademica;
use App\Models\Docente;
use App\Models\Semestre;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class CargaAcademicaController extends Controller
{
    
    /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE CARGA ACADEMICA EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar CargaAcademicas
    public function index()
    {
      $cargas_academicas = CargaAcademica::whereDoesntHave('asignatura', function ($query) {
      $query->where('escuela', 'INGENIERIA INFORMATICA');})->get();

      return view('admins.carga_academicas.index', compact('cargas_academicas'));

    }

    // Mostra la pagina de crear CargaAcademica
    public function create()
    {
        // Recuperar todos los docentes 
        $docentes = Docente::all();
        // Recuperar todas las asignaturas sin docente en el semestra actual
        $asignaturas = Asignatura::whereDoesntHave('cargasacademicas', function ($query) {
        $query->whereHas('docente')->whereHas('semestre', function ($subquery) {$subquery->where('estado', 'activo');});})
        ->where('escuela', '!=', 'INFORMATICA')->get();
        // Recuperar todos los semestres activos
        $semestres = Semestre::where('estado', 'Activo')->get();
        return view('admins.carga_academicas.create',compact('docentes', 'asignaturas', 'semestres'));
    }

    // Almacenar CargaAcademica
    public function store(Request $request)
    {        
        // Crear Carga Academica (Para que funciones importante en el Modelo los campos deben estar en $fillable)
        $carga_academica = CargaAcademica::create([
            'docente_id' => $request->docente_id,
            'asignatura_id' => $request->asignatura_id,            
            'semestre_id' => $request->semestre_id,            
        ]);

        return redirect()->route('carga_academicas.index')->with('mensaje', 'La Carga Academica '.$carga_academica->id.' ha sido agregada con exito');
    }

    // Mostrar datos de la CargaAcademica
    public function show(CargaAcademica $carga_academica)
    {
      $carga_academica = CargaAcademica::find($carga_academica->id);

      return view('admins.carga_academicas.show', compact('carga_academica'));
    }

    // Muestra la vista para editar la CargaAcademica
    public function edit(CargaAcademica $carga_academica)
    {
        $carga_academica = CargaAcademica::find($carga_academica->id);
        // Recuperar todos los docentes 
        $docentes = Docente::all();
        // Recuperar todas las asignaturas sin docente en el semestra actual
        $asignaturas = Asignatura::whereDoesntHave('cargasacademicas', function ($query) {
        $query->whereHas('docente')->whereHas('semestre', function ($subquery) {$subquery->where('estado', 'activo');});})->get();
        // Recuperar todos los semestres activos
        $semestres = Semestre::where('estado', 'Activo')->get();

        return view('admins.carga_academicas.edit', compact('carga_academica', 'docentes', 'asignaturas', 'semestres'));
    }

    // Para editar CargaAcademica
    public function update(Request $request, CargaAcademica $carga_academica)
    {
        $carga_academica = CargaAcademica::find($carga_academica->id);
        // Actualizar carga academica
        $carga_academica->update([
            'docente_id' => $request->docente_id,
            'asignatura_id' => $request->asignatura_id,            
            'semestre_id' => $request->semestre_id,
        ]);

        return redirect()->route('carga_academicas.index')->with('mensaje', 'La Carga Academica'.$carga_academica->id.' ha sido modificada con exito');
    }

    // Eliminar CargaAcademica
    public function destroy(CargaAcademica $carga_academica)
    {
        CargaAcademica::find($carga_academica->id)->delete();
        return back()->with('mensaje', 'La Carga Academica '.$carga_academica->id.' ha sido eliminada con exito');
    } 

}
