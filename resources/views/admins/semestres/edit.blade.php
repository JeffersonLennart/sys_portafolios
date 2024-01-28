@extends('adminlte::page')

@section('title', 'Editar Semestre')

@section('content_header')
  <h1 class="text-center"><b>Editar Semestre</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('semestres.update', $semestre) }}" method="POST">
            @csrf
            @method('PUT')

           <!-- Nombre -->
           <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="nombre">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre',$semestre->nombre) }}">
            </div>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Fecha Inicio -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="fecha_inicio">Fecha de Inicio:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio',$semestre->fecha_inicio) }}">
            </div>
            <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
        </div>            

        <!-- Fecha Fin -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="fecha_fin">Fecha de Fin:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin',$semestre->fecha_fin) }}">
            </div>
            <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
        </div>            

        <!-- Estado -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="estado">Estado:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado',$semestre->estado) }}">
            </div>
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>


            <div class="text-center" >                
                <input type="submit" value="Editar Semestre" class="btn btn-primary">             
                <a href="{{ route('semestres.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop