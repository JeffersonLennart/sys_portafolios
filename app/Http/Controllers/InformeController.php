<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeRequest;
use App\Models\Informe;
use App\Models\Revisor;
use App\Models\Docente;
use App\Models\Revision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    

     /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE INFORMES EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Informes
    public function index()
    {
        $informes = Informe::all();
        return view('admins.informes.index',compact('informes'));
    }

    // Mostra la pagina de crear Informe
    public function create()
    {
        return view('admins.informes.create');
    }

    // Almacenar Informe
    public function store(Request $revisione)
    {        
        $revisione = Revision::find($revisione->id);
        $fechaActual = Carbon::now()->format('Y-m-d');
        $cumplimiento = rand(0, 1) ? 1 : 0;
        // Actualizar revision
        $revisione->update([           
            'con_informe' => 1,
        ]);
        //crear informe
        // Crear informe 
        $informe = Informe::create([
            'revision_id' => $revisione->id,
            'revisor_id' => $revisione->revisor_id,   
            'fecha_informe' => $fechaActual,   
            'cumplimiento' => $cumplimiento,             
        ]);
        return redirect()->route('admins.informeSinEnviar')->with('mensaje', 'El Informe '.$revisione->id.' ha sido revisado con exito');
    }

    // Mostrar datos de la Informe
    public function show(Informe $informe)
    {
        $informe = Informe::find($informe->id);
        return view('admins.informes.show', compact('informe'));
    }

    // Muestra la vista para editar la Informe
    public function edit(Informe $informe)
    {
        $informe = Informe::find($informe->id);
        return view('admins.informes.edit', compact('informe'));
    }

    // Para editar Informe
    public function update(Request $request, Informe $informe)
    {
        $informe = Informe::find($informe->id);
        // Actualizar informe
        $informe->update([
            'revision_id' => $request->revision_id,
            'revisor_id' => $request->revisor_id,   
            'fecha_informe' => $request->fecha_informe,   
            'cumplimiento' => $request->cumplimiento,            
        ]);

        return redirect()->route('informes.index')->with('mensaje', 'El Informe '.$informe->id.' ha sido modificado con exito');
    }

    // Eliminar Informe
    public function destroy(Informe $informe)
    {
        Informe::find($informe->id)->delete();
        return back()->with('mensaje', 'El Informe '.$informe->id.' ha sido eliminado con exito');
    } 

    // Función para mostrar la vista de informes sin enviar que tenga opción para enviar informe
    public function informeSinEnviar()
    {
        $revisiones = Revision::where('con_informe', 0)->get();
        return view('admins.informes.informeSinEnviar',compact('revisiones'));
    }
}
