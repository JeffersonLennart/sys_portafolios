@extends('adminlte::page')

@section('title', 'Portafolios')
@section('plugins.Datatables', true)

@section('content_header')
  <h1 class="text-center"><b>Portafolios Revisados</b></h1>
@stop

@section('content')

@if (session('mensaje'))  
  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
    <b>{{ session('mensaje') }}</b>
  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<table id="tabla" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Asignatura</th>
            <th>Docente</th>
            <th>Tipo de Portafolio</th>                                  
            <th>Acciones</th>                
        </tr>
    </thead>
    <tbody>
        @foreach ($portafolios as $portafolio)
            <tr>
                <td>{{ $portafolio->id }}</td>
                <td>{{ $portafolio->cargaAcademica->asignatura->nombre }}</td>
                <td>{{ $portafolio->cargaAcademica->docente->user->name }}</td>
                <td>{{ $portafolio->tipo_portafolio }}</td>        
                <td>
                  <div class="btn-group" role="group" aria-label="Acciones">
                    <a href="{{ route('portafolios.portafolio_revisado_show', $portafolio) }}" class="btn btn-primary mr-2 btn-sm">Mostrar</a>
                  </div>
                </td>
              
                 
            </tr>
        @endforeach
    </tbody>
</table>


  
@stop

@section('css')
    <!-- Para bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <!-- Para bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Para el datatable -->
    <script src={{ asset('js/datatable.js') }}></script>               

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop