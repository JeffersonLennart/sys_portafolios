@extends('adminlte::page')

@section('title', 'Ver Asignación')

@section('content_header')
  <h1 class="text-center"><b>Datos de la Asignación</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Revisor</th>
                        <th>Docente</th>
                        <th>Semestre</th>                                        
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $asignacion->id }}</td>
                            <td>{{ $asignacion->revisor->user->name }}</td>
                            <td>{{ $asignacion->docente->user->name}}</td>
                            <td>{{ $asignacion->semestre->nombre }}</td>                                      
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('revisor_docentes.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop