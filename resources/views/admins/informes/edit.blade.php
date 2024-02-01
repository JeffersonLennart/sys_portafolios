@extends('adminlte::page')

@section('title', 'Editar Informe')

@section('content_header')
  <h1 class="text-center"><b>Editar Informe</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('informes.update', $informe) }}" method="POST">
            @csrf
            @method('PUT')

           <!-- Revision ID -->
           <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="revision_id">Revision ID:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="revision_id" name="revision_id" value="{{ old('revision_id',$informe->revision_id) }}">
            </div>
            <x-input-error :messages="$errors->get('revision_id')" class="mt-2" />
        </div>

        <!-- Revisor ID -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="revisor_id">Revisor ID:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="revisor_id" name="revisor_id" value="{{ old('revisor_id',$informe->revisor_id) }}">
            </div>
            <x-input-error :messages="$errors->get('revisor_id')" class="mt-2" />
        </div>            

        <!-- Fecha del Informe -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="fecha_informe">Fecha del Informe:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_informe" name="fecha_informe" value="{{ old('fecha_informe',$informe->fecha_informe) }}">
            </div>
            <x-input-error :messages="$errors->get('fecha_informe')" class="mt-2" />
        </div>            

        <!-- Cumplimiento -->
        <div class="form-group row">
            <label class="col-sm-1 col-form-label" for="cumplimiento">Cumplimiento:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="cumplimiento" name="cumplimiento" value="{{ old('cumplimiento',$informe->cumplimiento) }}">
            </div>
            <x-input-error :messages="$errors->get('cumplimiento')" class="mt-2" />
        </div>


            <div class="text-center" >                
                <input type="submit" value="Editar Informe" class="btn btn-primary">             
                <a href="{{ route('informes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop