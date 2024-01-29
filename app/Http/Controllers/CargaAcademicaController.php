<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargaAcademicaRequest;
use App\Models\CargaAcademica;
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
        
    }

    // Mostra la pagina de crear CargaAcademica
    public function create()
    {
        
    }

    // Almacenar CargaAcademica
    public function store(CargaAcademicaRequest $request)
    {        
        
    }

    // Mostrar datos de la CargaAcademica
    public function show(CargaAcademica $carga_academica)
    {
       
    }

    // Muestra la vista para editar la CargaAcademica
    public function edit(CargaAcademica $carga_academica)
    {
        
    }

    // Para editar CargaAcademica
    public function update(CargaAcademicaRequest $request, CargaAcademica $carga_academica)
    {
        
    }

    // Eliminar CargaAcademica
    public function destroy(CargaAcademica $carga_academica)
    {
       
    } 

    // Ruta para la carga academica de la escuela
    public function cargaAcademicaEscuela(){

    }
}
