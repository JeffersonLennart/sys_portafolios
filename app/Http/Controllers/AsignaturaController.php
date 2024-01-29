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
        
    }

    // Mostra la pagina de crear Asignatura
    public function create()
    {
        
    }

    // Almacenar Asignatura
    public function store(AsignaturaRequest $request)
    {        
        
    }

    // Mostrar datos de la Asignatura
    public function show(Asignatura $asignatura)
    {
       
    }

    // Muestra la vista para editar la Asignatura
    public function edit(Asignatura $asignatura)
    {
        
    }

    // Para editar Asignatura
    public function update(AsignaturaRequest $request, Asignatura $asignatura)
    {
        
    }

    // Eliminar Asignatura
    public function destroy(Asignatura $asignatura)
    {
       
    }  
}
