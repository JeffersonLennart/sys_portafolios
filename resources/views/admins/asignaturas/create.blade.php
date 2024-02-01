@extends('adminlte::page')

@section('title', 'Crear Asignatura')

@section('content_header')
  <h1 class="text-center"><b>Agregar nuevo Asignatura</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('asignaturas.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nombre">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <!-- Tipo -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="tipo">Tipo:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="Teórico" {{ old('tipo') == 'Teórico' ? 'selected' : '' }}>Teorica</option>
                        <option value="Teórico-Práctico" {{ old('tipo') == 'Teórico-Práctico' ? 'selected' : '' }}>Teorica Práctica</option>
                        <option value="Práctico" {{ old('tipo') == 'Práctico' ? 'selected' : '' }}>Practica</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            </div>            

            <!-- Codigo -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="codigo">Codigo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}">
                </div>
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>            

            <!-- Escuela -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="escuela">Escuela:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="escuela" name="escuela" value="{{ old('escuela') }}">
                </div>
                <x-input-error :messages="$errors->get('escuela')" class="mt-2" />
            </div>

            <!-- Categoria -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="categoria">Categoria:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}">
                </div>
                <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
            </div>

            <!-- Creditos -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="creditos">Creditos:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="creditos" name="creditos" value="{{ old('creditos') }}">
                </div>
                <x-input-error :messages="$errors->get('creditos')" class="mt-2" />
            </div>
                       

            <div class="text-center" >                
                <input type="submit" value="Crear Asignatura" class="btn btn-primary">             
                <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop