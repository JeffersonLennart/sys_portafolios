<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevisionRequest;
use App\Models\Revision;
use Illuminate\Http\Request;

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
}
