<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use App\Http\Requests\StoreSemestreRequest;
use App\Http\Requests\UpdateSemestreRequest;

class SemestreController extends Controller
{

   /*
        *******************************************************************
            CONTROLADORES PARA EL CRUD DE SEMESTRE EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Semestres
    public function index()
    {
        // Recuperar semestres
        $semestres = Semestre::all();
        return view('admins.semestres.index',compact('semestres'));
    }

    // Mostra la pagina de crear Semestre
    public function create()
    {
        return view('admins.semestres.create');
    }

    // Almacenar el Semestre
    public function store(StoreSemestreRequest $request)
    {        
        // Crear Semestre (Para que funciones importante en el Modelo de semestre los campos deben estar en $fillable)
        $semestre = Semestre::create([
                    'nombre' => $request->nombre,
                    'fecha_inicio' => $request->fecha_inicio,            
                    'fecha_fin' => $request->fecha_fin,
                    'estado' => $request->estado,            
                    ]);

        return redirect()->route('semestres.index')->with('mensaje', 'El Semestre '.$semestre->id.' ha sido agregado con exito');
    }

    // Mostrar datos del Semestre
    public function show(Semestre $semestre)
    {
        $semestre = Semestre::find($semestre->id);

        return view('admins.semestres.show', compact('semestre'));
    }

    // Muestra la vista para editar el semestre 
    public function edit(Semestre $semestre)
    {
        $semestre = Semestre::find($semestre->id);
        return view('admins.semestres.edit', compact('semestre'));
    }

    // Para el Editar de Semestre
    public function update(UpdateSemestreRequest $request, Semestre $semestre)
    {
        $semestre = Semestre::find($semestre->id);
        // Actualizar semestre
        $semestre->update([
            'nombre' => $request->nombre,
            'fecha_inicio' => $request->fecha_inicio,            
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado,    
        ]);

        return redirect()->route('semestres.index')->with('mensaje', 'El Semestre '.$semestre->id.' ha sido modificado con exito');
    }

    // Eliminar Semestre
    public function destroy(Semestre $semestre)
    {
        Semestre::find($semestre->id)->delete();
        return back()->with('mensaje', 'El Semestre '.$semestre->id.' ha sido eliminado con exito');
    }   
}
