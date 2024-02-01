@extends('adminlte::page')

@section('title', 'Revisar Portafolio')

@section('content_header')
  <h1 class="text-center"><b>Revisar Portafolio</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('revisiones.RevisionStore') }}" method="POST">
            @csrf

            <!-- Docente -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="id">ID:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="{{ $portafolio->id }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

           <!-- Docente -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Docente:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="{{ $portafolio->cargaAcademica->docente->user->name }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Asignatura -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Asignatura:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="{{ $portafolio->cargaAcademica->asignatura->nombre }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Tipo de portafolio -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Tipo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  value="{{ $portafolio->tipo_portafolio }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- observaciones -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Observacion:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observaciones" name="observaciones" style="height: 70px; white-space: pre-wrap;">
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>            


            <div class="text-center" >                
                <button type="submit" name="id" value="{{ $portafolio->id }}"
                class="btn btn-primary">Revisar Portafolio</button>             
                <a href="{{ route('revisores.revisarPortafolios') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop