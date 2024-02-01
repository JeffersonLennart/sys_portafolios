<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevisionRequest;
use App\Models\Revision;
use Illuminate\Http\Request;
use App\Models\Portafolio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{

    /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE REVISION EN EL PANEL DE ADMIN
        *******************************************************************
    */

    // Mostrar Revisions
    public function index()
    {
        // Recuperar revisiones
        $revisiones = Revision::all();
        return view('admins.revisiones.index',compact('revisiones'));
    }

    // Mostra la pagina de crear Revision
    public function create()
    {

    }

    // Almacenar Revision
    public function store(RevisionRequest $request)
    {        
        
    }

    // Mostrar datos de la Revision
    public function show(Revision $revisione)
    {
      $revisione = Revision::find($revisione->id);
      return view('admins.revisiones.show', compact('revisione'));
    }

    // Muestra la vista para editar la Revision
    public function edit(Revision $revisione)
    {
      $revisione = Revision::find($revisione->id);
      return view('admins.revisiones.edit', compact('revisione')); 
    }

    // Para editar Revision
    public function update(Request $request, Revision $revisione)
    {
      $revisione = Revision::find($revisione->id);
      // Actualizar semestre
      $revisione->update([           
          'observaciones' => $request->observaciones, 
      ]);

      return redirect()->route('revisiones.index')->with('mensaje', 'La revision '.$revisione->id.' ha sido modificada con exito');  
    }

    // Eliminar Revision
    public function destroy(Revision $revisione)
    {
        Revision::find($revisione->id)->delete();
        return back()->with('mensaje', 'La revision '.$revisione->id.' ha sido eliminada con exito'); 
    }

     /*
        *******************************************************************
            FUNCIONES PARA EL CRUD DE REVISION EN EL PANEL DE REVISOR
        *******************************************************************
    */

    // Mostra la pagina de Revisar Portafolio
    public function RevisionCreate(Portafolio $portafolio)
    {
      $portafolio = Portafolio::find($portafolio->id);
      return view('revisores.portafolios.revisar', compact('portafolio')); 
    }

    // Almacenar Revision 
    public function RevisionStore(Request $request)
    { 
        $revisorId = Auth::user()->id;    
        $portafolio = Portafolio::find($request->id);
        $fechaActual = Carbon::now()->format('Y-m-d');
        $revision = Revision::create([
            'portafolio_id' => $portafolio->id,
            'revisor_id' => $revisorId,
            'numero_revision' => 1,
            'fecha_revision' => $fechaActual,
            'con_informe' => 0,
            'observaciones' => $request->observaciones,            
        ]);
        return redirect()->route('revisores.revisarPortafolios')->with('mensaje', 'El Portafolio '.$portafolio->id.' ha sido revisado con exito');
    }

    // Mostrar datos de la Revision
    public function RevisionShow(Revision $revisione)
    {
      $revisione = Revision::find($revisione->id);
      return view('revisores.revisiones.show', compact('revisione'));
    }

}
