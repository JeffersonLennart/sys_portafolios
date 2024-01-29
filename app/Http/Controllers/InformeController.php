<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeRequest;
use App\Models\Informe;
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
        
    }

    // Mostra la pagina de crear Informe
    public function create()
    {
        
    }

    // Almacenar Informe
    public function store(InformeRequest $request)
    {        
        
    }

    // Mostrar datos de la Informe
    public function show(Informe $informe)
    {
       
    }

    // Muestra la vista para editar la Informe
    public function edit(Informe $informe)
    {
        
    }

    // Para editar Informe
    public function update(InformeRequest $request, Informe $informe)
    {
        
    }

    // Eliminar Informe
    public function destroy(Informe $informe)
    {
       
    } 

    // Función para mostrar la vista de informes sin enviar que tenga opción para enviar informe
    public function informeSinEnviar(){

    }
}
