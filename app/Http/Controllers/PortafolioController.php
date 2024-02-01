<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortafolioRequest;
use App\Models\CargaAcademica;
use App\Models\Portafolio;
use com_exception;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    
    /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE PORTAFOLIOS EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Portafolios
    public function index()
    {
        $portafolios = Portafolio::doesntHave('revisiones')->get();
        return view('admins.portafolios.index',compact('portafolios'));
    }

    // Mostra la pagina de crear Portafolio
    public function create()
    {
        return view('admins.portafolios.create');
    }

    // Almacenar Portafolio
    public function store(Request $request)
    {        
        // Crear Asignatura 
        $portafolio = Portafolio::create([
            'carga_academica_id' => $request->carga_academica_id,
            'tipo_portafolio' => $request->tipo_portafolio,             
        ]);
        return redirect()->route('portafolios.index')->with('mensaje', 'El Portafolio '.$portafolio->id.' ha sido agregado con exito');
    }

    // Mostrar datos de la Portafolio
    public function show(Portafolio $portafolio)
    {
        $portafolio = Portafolio::find($portafolio->id);
        return view('admins.portafolios.show', compact('portafolio'));
    }

    // Muestra la vista para editar la Portafolio
    public function edit(Portafolio $portafolio)
    {
        $portafolio = Portafolio::find($portafolio->id);
        return view('admins.portafolios.edit', compact('portafolio'));
    }

    // Para editar Portafolio
    public function update(Request $request, Portafolio $portafolio)
    {
        $portafolio = Portafolio::find($portafolio->id);
        // Actualizar portafolio
        $portafolio->update([
            'carga_academica_id' => $request->carga_academica_id,
            'tipo_portafolio' => $request->tipo_portafolio,            
        ]);

        return redirect()->route('portafolios.index')->with('mensaje', 'El Portafolio '.$portafolio->id.' ha sido modificado con exito');
    }

    // Eliminar Portafolio
    public function destroy(Portafolio $portafolio)
    {
        Portafolio::find($portafolio->id)->delete();
        return back()->with('mensaje', 'El Portafolio '.$portafolio->id.' ha sido eliminado con exito');
    } 

    public function portafolio_revisado_show(Portafolio $portafolio)
    {
        $portafolio = Portafolio::find($portafolio->id);
        return view('admins.portafolios.portafolio_revisado_show', compact('portafolio'));
    }

    public function enviar_carga(CargaAcademica $carga_academica)
    {        
        $carga_academica = CargaAcademica::find($carga_academica->id);
        return view('docentes.enviar_carga', compact('carga_academica'));
    }
    public function enviar_store(Request $request)
    {        
        // Crear Asignatura 
        $portafolio = Portafolio::create([
            'carga_academica_id' => $request->carga_academica_id,
            'tipo_portafolio' => $request->tipo_portafolio,             
        ]);
        return redirect()->route('portafolios.index')->with('mensaje', 'El Portafolio '.$portafolio->id.' ha sido agregado con exito');
    }

}
