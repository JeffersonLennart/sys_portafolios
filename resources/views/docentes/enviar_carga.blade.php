@extends('adminlte::page')

@section('title', 'Crear Portafolio')

@section('content_header')
  <h1 class="text-center"><b>Enviar Portafolio</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('portafolios.enviar_store') }}" method="POST">
            @csrf

            <!-- Carga Academica ID -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="carga_academica_id">Carga Academica ID:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="carga_academica_id" name="carga_academica_id" value="{{ $carga_academica->id }}" disabled>
                </div>
                <x-input-error :messages="$errors->get('carga_academica_id')" class="mt-2" />
            </div>

            <!-- Tipo de Portafolio -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="tipo_portafolio">Tipo de Portafolio:</label>
                <div class="col-sm-10">
                <select class="form-control" id="tipo_portafolio" name="tipo_portafolio">
                    <option value="Teórico" {{ old('tipo_portafolio') == 'teorico' ? 'selected' : '' }}>Teorico</option>
                    <option value="Práctico" {{ old('tipo_portafolio') == 'practico' ? 'selected' : '' }}>Practico</option>
                </select>                </div>
                <x-input-error :messages="$errors->get('tipo_portafolio')" class="mt-2" />
            </div>            
                       

            <div class="text-center" >     
                <button type="submit" name="carga_academica_id" value="{{ $carga_academica->id }}"
                class="btn btn-primary">Enviar Portafolio</button>                      
                <a href="{{ route('docentes.enviarPortafolio') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop