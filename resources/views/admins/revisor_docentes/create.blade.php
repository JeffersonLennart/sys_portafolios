@extends('adminlte::page')

@section('title', 'Asignación Revisores')

@section('content_header')
  <h1 class="text-center"><b>Agregar nueva asignación</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('revisor_docentes.store') }}" method="POST">
            @csrf

            <!-- Docente -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="docente_id">Docente sin Revisor:</label>
                <div class="col-sm-10">
                    <select id="docente_id" name="docente_id" class="form-control col-12" required>
                        @foreach ( $docentes as $docente )
                            <option value="{{ $docente->id }}" {{ old('docente_id') == $docente->id  ? 'selected' : '' }}>{{ $docente->user->name }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('docente_id')" class="mt-2" />
            </div>

            <!-- Revisor -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="revisor_id">Revisor:</label>
                <div class="col-sm-10">
                    <select id="revisor_id" name="revisor_id" class="form-control col-12" required>
                        @foreach ( $revisores as $revisor )
                            <option value="{{ $revisor->id }}" {{ old('revisor_id') == $revisor->id  ? 'selected' : '' }}>{{ $revisor->user->name }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('revisor_id')" class="mt-2" />
            </div>           

            <!-- Semestre -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="revisor_id">Semestre:</label>
                <div class="col-sm-10">
                    <select id="semestre_id" name="semestre_id" class="form-control col-12" required>
                        @foreach ( $semestres as $semestre )
                            <option value="{{ $semestre->id }}" {{ old('semestre_id') == $semestre->id  ? 'selected' : '' }}>{{ $semestre->nombre }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('semestre_id')" class="mt-2" />
            </div>           
                       

            <div class="text-center" >                
                <input type="submit" value="Crear Asignación" class="btn btn-primary">             
                <a href="{{ route('revisor_docentes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop