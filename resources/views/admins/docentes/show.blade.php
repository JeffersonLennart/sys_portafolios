@extends('adminlte::page')

@section('title', 'Ver Docente')

@section('content_header')
  <h1 class="text-center"><b>Datos del Docente</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>                
                        <th>Código</th>                
                        <th>Categoria</th>                
                        <th>Grado Académico</th>                                         
                        <th>Foto</th>                                         
                    </tr>
                </thead>
                <tbody>                    
                        <tr>
                            <td>{{ $docente->id }}</td>
                            <td>{{ $docente->name }}</td>
                            <td>{{ $docente->email }}</td>
                            <td>{{ $docente->telefono }}</td>
                            <td>{{ $docente->codigo }}</td>
                            <td>{{ $docente->categoria }}</td>                
                            <td>{{ $docente->grado_academico }}</td>                                         
                            <td>
                                <div class="img-boton">
                                    <img src="{{ asset('images/profile.png') }}" class="img-fluid">
                                </div>
                            </td>                                         
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('docentes.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@stop