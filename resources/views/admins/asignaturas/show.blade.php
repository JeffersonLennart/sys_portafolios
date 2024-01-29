@extends('adminlte::page')

@section('title', 'Ver Asignatura')

@section('content_header')
  <h1 class="text-center"><b>Datos del Asignatura</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Codigo</th>                
                        <th>Escuela</th>                                   
                        <th>Categoria</th>        
                        <th>Creditos</th>                                                         
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $asignatura->id }}</td>
                            <td>{{ $asignatura->nombre }}</td>
                            <td>{{ $asignatura->tipo }}</td>
                            <td>{{ $asignatura->codigo }}</td>
                            <td>{{ $asignatura->escuela }}</td>     
                            <td>{{ $asignatura->categoria }}</td>
                            <td>{{ $asignatura->creditos }}</td>                                      
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('asignaturas.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop