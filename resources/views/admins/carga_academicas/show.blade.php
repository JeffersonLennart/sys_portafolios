@extends('adminlte::page')

@section('title', 'Carga Academica')

@section('content_header')
  <h1 class="text-center"><b>Datos de la Carga Academica</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Docente</th>
                        <th>Docente</th>
                        <th>ID Asignatura</th>
                        <th>Asignatura</th>
                        <th>Escuela</th> 
                        <th>Semestre</th>                                                                     
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $carga_academica->docente_id }}</td>
                            <td>{{ $carga_academica->docente->user->name }}</td>
                            <td>{{ $carga_academica->asignatura_id }}</td>
                            <td>{{ $carga_academica->asignatura->nombre}}</td> 
                            <td>{{ $carga_academica->asignatura->escuela}}</td> 
                            <td>{{ $carga_academica->semestre->nombre}}</td>                                     
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('carga_academicas.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop