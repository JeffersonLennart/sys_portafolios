@extends('adminlte::page')

@section('title', 'Informes')
@section('plugins.Datatables', true)

@section('content_header')
  <h1 class="text-center"><b>Registro de Informes Sin Enviar</b></h1>
@stop

@section('content')

@if (session('mensaje'))  
  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
    <b>{{ session('mensaje') }}</b>
  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card-header">
  <a href="{{ route('informes.create') }}" class="btn btn-primary btn-sm mb-2"><b>Agregar Informe</b></a>
</div>

<table id="tabla" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Asignatura</th>
            <th>Docente</th>
            <th>Fecha del Informe</th>                
            <th>Cumplimiento</th>                                   
            <th>Acciones</th>                 
        </tr>
    </thead>
    <tbody>
        @foreach ($informes as $informe)
            <tr>
                <td>{{ $informe->id }}</td>
                <td>{{ $informe->revision->portafolio->cargaAcademica->asignatura->nombre }}</td>
                <td>{{ $informe->revisor->user->name }}</td>
                <td>{{ $informe->fecha_informe }}</td>
                <td>{{ $informe->cumplimiento }}</td>          
                <td>
                  <div class="btn-group" role="group" aria-label="Acciones">
                    <a href="{{ route('informes.show', $informe) }}" class="btn btn-primary mr-2 btn-sm">Mostrar</a>
                    <a href="{{ route('informes.edit', $informe) }}" class="btn btn-primary mr-2 btn-sm">Editar</a>
                      <form method="POST" action="{{ route('informes.destroy', $informe) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
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