@extends('adminlte::page')

@section('title', 'Editar Carga Academica')

@section('content_header')
  <h1 class="text-center"><b>Editar Carga Academica</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('carga_academicas.update', $carga_academica) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Docente -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="docente_id">Docente:</label>
                <div class="col-sm-10">
                    <select id="docente_id" name="docente_id" class="form-control col-12" required>
                        <option value="{{ $carga_academica->docente_id }}" selected>{{ $carga_academica->docente->user->name }}</option>
                        @foreach ( $docentes as $docente )
                            <option value="{{ $docente->id }}" {{ old('docente_id') == $docente->id  ? 'selected' : '' }}>{{ $docente->user->name }}</option>                            
                        @endforeach                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('docente_id')" class="mt-2" />
            </div>

            <!-- Asignaturas -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="revisor_id">Asignatura:</label>
                <div class="col-sm-10">
                    <select id="asignatura_id" name="asignatura_id" class="form-control col-12" required>
                        <?php $defaultAsignatura = $carga_academica->asignatura_id ?? old('asignatura_id'); ?>
                        @foreach ( $asignaturas as $asignatura )
                            <option value="{{ $asignatura->id }}" {{ $defaultAsignatura == $asignatura->id  ? 'selected' : '' }}>{{ $asignatura->nombre }}</option>                            
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
                        <?php $defaultSemestre = $carga_academica->semestre_id ?? old('semestre_id'); ?>
                        @foreach ( $semestres as $semestre )
                            <option value="{{ $semestre->id }}" {{ $defaultSemestre == $semestre->id ? 'selected' : '' }}>{{ $semestre->nombre }}</option>                           
                        @endforeach                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('semestre_id')" class="mt-2" />
            </div> 
                       

            <div class="text-center" >                
                <input type="submit" value="Editar Carga Academica" class="btn btn-primary">             
                <a href="{{ route('carga_academicas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop