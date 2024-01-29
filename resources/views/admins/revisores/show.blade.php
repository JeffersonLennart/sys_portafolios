@extends('adminlte::page')

@section('title', 'Ver Revisor')

@section('content_header')
  <h1 class="text-center"><b>Datos del Revisor</b></h1>
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
                            <td>{{ $revisor->user->id }}</td>
                            <td>{{ $revisor->user->name }}</td>
                            <td>{{ $revisor->user->email }}</td>
                            <td>{{ $revisor->user->telefono }}</td>
                            <td>{{ $revisor->user->codigo }}</td>
                            <td>{{ $revisor->user->categoria }}</td>                
                            <td>{{ $revisor->user->grado_academico }}</td>                                         
                            <td>
                                <div class="img-boton">
                                    <img src="{{ asset('images/profile.png') }}" class="img-fluid">
                                </div>
                            </td>                                         
                        </tr>                    
                </tbody>
            </table>

            <div class="text-center mt-2">
                <a class="btn btn-secondary" href="{{ route('revisores.index') }}">Volver</a>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@stop