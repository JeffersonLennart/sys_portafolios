@extends('adminlte::page')

@section('title', 'Ver Revision')

@section('content_header')
  <h1 class="text-center"><b>Datos de la Revision</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Docente</th>
                      <th>Revisor</th>
                      <th>Asignatura</th>
                      <th>Numero de revision</th>                
                      <th>Fecha de revision</th>  
                      <th>Observaciones</th>         
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                          <td>{{ $revisione->id }}</td>
                          <td>{{ $revisione->portafolio->cargaAcademica->docente->user->name }}</td>
                          <td>{{ $revisione->revisor->user->name }}</td>
                          <td>{{ $revisione->portafolio->cargaAcademica->asignatura->nombre }}</td>
                          <td>{{ $revisione->numero_revision }}</td>
                          <td>{{ $revisione->fecha_revision }}</td>
                          <td>{{ $revisione->observaciones }}</td>                                     
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('revisiones.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop