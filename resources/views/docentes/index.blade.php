@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')        

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-left"><b>SISTEMA DE PORTAFOLIOS</b> <img src="{{ asset('images/logo.png') }}" width="50" height="50"></h1>
            </div>
            <div class="col-6">                
                <h1 class="text-right"><b>{{ now()->format('d/m/Y') }}</b></h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div  class="text-center">
        <img src="{{ asset('images/profile.png') }}" width="250" height="250" class="rounded-circle">
    </div>
    <h5 class="text-center">¡Hola! <b>{{ Auth::user()->name }}</b> desde aqui podras ver tu carga académica y hacer seguimiento a tus portafolios.</h5>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Carga Académica</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">                            
                            <a href="{{ route('docentes.cargaAcademica') }}" class="btn btn-primary"><img src="{{ asset('images/portafolio.png') }}" width="150" height="150"></a>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Enviar Portafolio</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">                            
                            <a href="{{ route('docentes.enviarPortafolio') }}" class="btn btn-primary"><img src="{{ asset('images/enviar.png') }}" width="150" height="150"></a>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Portafolios Revisados</b>
                    </div>
                    <div class="card-body">
                        <div class="text-center">                            
                            <a href="{{ route('docentes.portafoliosRevisados') }}" class="btn btn-primary"><img src="{{ asset('images/revisados.png') }}" width="150" height="150"></a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .btn-primary {
            background-color: transparent !important;
            border: none !important;
        }
    
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop