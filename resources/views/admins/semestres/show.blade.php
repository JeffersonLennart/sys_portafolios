@extends('adminlte::page')

@section('title', 'Ver Semestre')

@section('content_header')
  <h1 class="text-center"><b>Datos del Semestre</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>                
                        <th>Estado</th>                                                        
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $semestre->id }}</td>
                            <td>{{ $semestre->nombre }}</td>
                            <td>{{ $semestre->fecha_inicio }}</td>
                            <td>{{ $semestre->fecha_fin }}</td>                                     
                            <td>{{ $semestre->estado }}</td>                                     
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('semestres.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop