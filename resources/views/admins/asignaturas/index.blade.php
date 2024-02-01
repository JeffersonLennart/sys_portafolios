@extends('adminlte::page')

@section('title', 'Asignatura')
@section('plugins.Datatables', true)

@section('content_header')
  <h1 class="text-center"><b>Registro de Asignatura</b></h1>
@stop

@section('content')

@if (session('mensaje'))  
  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
    <b>{{ session('mensaje') }}</b>
  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card-header">
  <a href="{{ route('asignaturas.create') }}" class="btn btn-primary btn-sm mb-2"><b>Agregar Asignatura</b></a>
</div>

<table id="tabla" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Codigo</th>                
            <th>Escuela</th>                                   
            <th>Categoria</th>        
            <th>Creditos</th>  
            <th>Acciones</th>        
        </tr>
    </thead>
    <tbody>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->id }}</td>
                <td>{{ $asignatura->nombre }}</td>
                <td>{{ $asignatura->tipo }}</td>
                <td>{{ $asignatura->codigo }}</td>
                <td>{{ $asignatura->escuela }}</td>     
                <td>{{ $asignatura->categoria }}</td>
                <td>{{ $asignatura->creditos }}</td>      
                <td>
                  <div class="btn-group" role="group" aria-label="Acciones">
                    <a href="{{ route('asignaturas.show', $asignatura) }}" class="btn btn-primary mr-2 btn-sm">Mostrar</a>
                    <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-primary mr-2 btn-sm">Editar</a>
                      <form method="POST" action="{{ route('asignaturas.destroy', $asignatura) }}">
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