@extends('adminlte::page')

@section('title', 'Editar Revision')

@section('content_header')
  <h1 class="text-center"><b>Editar Revision</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('revisiones.update', $revisione) }}" method="POST">
            @csrf
            @method('PUT')

           <!-- Docente -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Docente:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $revisione->portafolio->cargaAcademica->docente->user->name }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Revisor -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Revisor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $revisione->revisor->user->name }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Asignatura -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Asignatura:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $revisione->portafolio->cargaAcademica->asignatura->nombre }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Numero de revision -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Numero de revision:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $revisione->numero_revision }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Fecha de revision -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Fecha de revision:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $revisione->fecha_revision }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- observaciones -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Observacion:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{ $revisione->observaciones }}">
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>          

            <div class="text-center" >                
                <input type="submit" value="Editar Revision" class="btn btn-primary">             
                <a href="{{ route('revisiones.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop