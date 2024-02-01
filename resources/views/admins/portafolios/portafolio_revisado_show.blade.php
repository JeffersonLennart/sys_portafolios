@extends('adminlte::page')

@section('title', 'Ver Portafolo')

@section('content_header')
  <h1 class="text-center"><b>Datos del Portafolio</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Carga Academica ID</th>
                        <th>Tipo de Portafolio</th>                                                       
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $portafolio->id }}</td>
                            <td>{{ $portafolio->carga_academica_id }}</td>
                            <td>{{ $portafolio->tipo_portafolio }}</td>                                   
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('docentes.portafoliosRevisados') }}">Volver</a>
            </div>

        </div>
    </div>
@stop