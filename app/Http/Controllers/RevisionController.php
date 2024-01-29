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
       
    }

    // Muestra la vista para editar la Revision
    public function edit(Revision $revisione)
    {
        
    }

    // Para editar Revision
    public function update(RevisionRequest $request, Revision $revisione)
    {
        
    }

    // Eliminar Revision
    public function destroy(Revision $revisione)
    {
       
    } 
}
