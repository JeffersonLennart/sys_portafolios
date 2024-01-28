@extends('adminlte::page')

@section('title', 'Editar Docente')

@section('content_header')
  <h1 class="text-center"><b>Editar Docente</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admins.updateDocente', $docente) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="name">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $docente->name) }}">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Código -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="codigo">Código:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $docente->codigo) }}">
                </div>
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="telefono">Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $docente->telefono) }}">
                </div>
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>
            
            <!-- Categoria -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="categoria">Categoria:</label>
                <div class="col-sm-10">
                    <select id="categoria" name="categoria" class="form-control col-12" required>
                        <?php $defaultCategoria = $docente->categoria ?? old('categoria'); ?>
                        <option value="PR-DE" {{ $defaultCategoria == 'PR-DE' ? 'selected' : '' }}>PR-DE</option>
                        <option value="PR-TC" {{ $defaultCategoria == 'PR-TC' ? 'selected' : '' }}>PR-TC</option>
                        <option value="AS-DE" {{ $defaultCategoria == 'AS-DE' ? 'selected' : '' }}>AS-DE</option>
                        <option value="AS-TC" {{ $defaultCategoria == 'AS-TC' ? 'selected' : '' }}>AS-TC</option>
                        <option value="AS-TP" {{ $defaultCategoria == 'AS-TP' ? 'selected' : '' }}>AS-TP</option>
                        <option value="AUX-TC" {{ $defaultCategoria == 'AUX-TC' ? 'selected' : '' }}>AUX-TC</option>
                        <option value="AUX-TP 10H" {{ $defaultCategoria == 'AUX-TP 10H' ? 'selected' : '' }}>AUX-TP 10H</option>
                        <option value="A1" {{ $defaultCategoria == 'A1' ? 'selected' : '' }}>A1</option>
                        <option value="B1" {{ $defaultCategoria == 'B1' ? 'selected' : '' }}>B1</option>
                        <option value="B2" {{ $defaultCategoria == 'B2' ? 'selected' : '' }}>B2</option>
                        <option value="B3" {{ $defaultCategoria == 'B3' ? 'selected' : '' }}>B3</option>
                        <option value="JP-20H" {{ $defaultCategoria == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                        <option value="JP-TC" {{ $defaultCategoria == 'JP-TC' ? 'selected' : '' }}>JP-TC</option>
                        <option value="JP-10H" {{ $defaultCategoria == 'JP-10H' ? 'selected' : '' }}>JP-10H</option>
                        <option value="JP-20H" {{ $defaultCategoria == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
            </div>

            <!-- Grado Académico -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="grado_academico">Grado Académico:</label>
                <div class="col-sm-10">
                    <select id="grado_academico" name="grado_academico" class="form-control col-12" required>
                        <?php $defaultGradoAcademico = $docente->grado_academico ?? old('grado_academico'); ?>
                        <option value="Ingeniero" {{ $defaultGradoAcademico == 'Ingeniero' ? 'selected' : '' }}>Ingeniero</option>
                        <option value="Magister" {{ $defaultGradoAcademico == 'Magister' ? 'selected' : '' }}>Magister</option>
                        <option value="Doctor" {{ $defaultGradoAcademico == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('grado_academico')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $docente->email) }}">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <div class="text-center" >                
                <input type="submit" value="Editar Docente" class="btn btn-primary">             
                <a href="{{ route('admins.indexDocente') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop