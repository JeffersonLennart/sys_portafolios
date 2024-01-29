<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortafolioRequest;
use App\Models\Portafolio;
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
        
    }

    // Mostra la pagina de crear Portafolio
    public function create()
    {
        
    }

    // Almacenar Portafolio
    public function store(PortafolioRequest $request)
    {        
        
    }

    // Mostrar datos de la Portafolio
    public function show(Portafolio $portafolio)
    {
       
    }

    // Muestra la vista para editar la Portafolio
    public function edit(Portafolio $portafolio)
    {
        
    }

    // Para editar Portafolio
    public function update(PortafolioRequest $request, Portafolio $portafolio)
    {
        
    }

    // Eliminar Portafolio
    public function destroy(Portafolio $portafolio)
    {
       
    } 
}
