<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsignaturaRequest;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
     /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE ASIGNATURAS EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar asignaturas
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('admins.asignaturas.index',compact('asignaturas'));
    }

    // Mostra la pagina de crear Asignatura
    public function create()
    {
        return view('admins.asignaturas.create');
    }

    // Almacenar Asignatura
    public function store(Request $request)
    {        
        // Crear Asignatura 
        $asignatura = Asignatura::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,            
            'codigo' => $request->codigo,
            'escuela' => $request->escuela,  
            'categoria' => $request->categoria, 
            'creditos' => $request->creditos,             
        ]);
        return redirect()->route('asignaturas.index')->with('mensaje', 'La Asignatura '.$asignatura->id.' ha sido agregado con exito');
    }

    // Mostrar datos de la Asignatura
    public function show(Asignatura $asignatura)
    {
        $asignatura = Asignatura::find($asignatura->id);

        return view('admins.asignaturas.show', compact('asignatura'));
    }

    // Muestra la vista para editar la Asignatura
    public function edit(Asignatura $asignatura)
    {
        $asignatura = Asignatura::find($asignatura->id);
        return view('admins.asignaturas.edit', compact('asignatura'));
    }

    // Para editar Asignatura
    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura = Asignatura::find($asignatura->id);
        // Actualizar asignatura
        $asignatura->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,            
            'codigo' => $request->codigo,
            'escuela' => $request->escuela,  
            'categoria' => $request->categoria, 
            'cretidos' => $request->creditos,   
        ]);

        return redirect()->route('asignaturas.index')->with('mensaje', 'La Asignatura '.$asignatura->id.' ha sido modificado con exito');
    }

    // Eliminar Asignatura
    public function destroy(Asignatura $asignatura)
    {
        Asignatura::find($asignatura->id)->delete();
        return back()->with('mensaje', 'La Asignatura '.$asignatura->id.' ha sido eliminado con exito');
    }  
}
