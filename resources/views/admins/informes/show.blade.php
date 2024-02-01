@extends('adminlte::page')

@section('title', 'Ver Informe')

@section('content_header')
  <h1 class="text-center"><b>Datos del Informe</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Revision ID</th>
                        <th>Revisor ID</th>
                        <th>Fecha del Informe</th>                
                        <th>Cumplimiento</th>                                   
                        <th>Acciones</th>                                                       
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $informe->id }}</td>
                            <td>{{ $informe->revision_id }}</td>
                            <td>{{ $informe->revisor_id }}</td>
                            <td>{{ $informe->fecha_informe }}</td>
                            <td>{{ $informe->cumplimiento }}</td>                                     
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('informes.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop