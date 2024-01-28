@extends('adminlte::page')

@section('title', 'Crear Revisor')

@section('content_header')
  <h1 class="text-center"><b>Agregar nuevo Revisor</b></h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('revisores.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="name">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Código -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="codigo">Código:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}">
                </div>
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>

            <!-- Teléfono -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="telefono">Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                </div>
                <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
            </div>
            
            <!-- Categoria -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="categoria">Categoria:</label>
                <div class="col-sm-10">
                    <select id="categoria" name="categoria" class="form-control col-12" required>
                        <option value="PR-DE" {{ old('categoria') == 'PR-DE' ? 'selected' : '' }}>PR-DE</option>
                        <option value="PR-TC" {{ old('categoria') == 'PR-TC' ? 'selected' : '' }}>PR-TC</option>
                        <option value="AS-DE" {{ old('categoria') == 'AS-DE' ? 'selected' : '' }}>AS-DE</option>
                        <option value="AS-TC" {{ old('categoria') == 'AS-TC' ? 'selected' : '' }}>AS-TC</option>
                        <option value="AS-TP" {{ old('categoria') == 'AS-TP' ? 'selected' : '' }}>AS-TP</option>
                        <option value="AUX-TC" {{ old('categoria') == 'AUX-TC' ? 'selected' : '' }}>AUX-TC</option>
                        <option value="AUX-TP 10H" {{ old('categoria') == 'AUX-TP 10H' ? 'selected' : '' }}>AUX-TP 10H</option>
                        <option value="A1" {{ old('categoria') == 'A1' ? 'selected' : '' }}>A1</option>
                        <option value="B1" {{ old('categoria') == 'B1' ? 'selected' : '' }}>B1</option>
                        <option value="B2" {{ old('categoria') == 'B2' ? 'selected' : '' }}>B2</option>
                        <option value="B3" {{ old('categoria') == 'B3' ? 'selected' : '' }}>B3</option>
                        <option value="JP-20H" {{ old('categoria') == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                        <option value="JP-TC" {{ old('categoria') == 'JP-TC' ? 'selected' : '' }}>JP-TC</option>
                        <option value="JP-10H" {{ old('categoria') == 'JP-10H' ? 'selected' : '' }}>JP-10H</option>
                        <option value="JP-20H" {{ old('categoria') == 'JP-20H' ? 'selected' : '' }}>JP-20H</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
            </div>

            <!-- Grado Académico -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="grado_academico">Grado Académico:</label>
                <div class="col-sm-10">
                    <select id="grado_academico" name="grado_academico" class="form-control col-12" required>
                        <option value="Ingeniero" {{ old('grado_academico') == 'Ingeniero' ? 'selected' : '' }}>Ingeniero</option>
                        <option value="Magister" {{ old('grado_academico') == 'Magister' ? 'selected' : '' }}>Magister</option>
                        <option value="Doctor" {{ old('grado_academico') == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                    </select>
                </div>
                <x-input-error :messages="$errors->get('grado_academico')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="password">Contraseña:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="password_confirmation">Confirmar Contraseña:</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="text-center" >                
                <input type="submit" value="Crear Revisor" class="btn btn-primary">             
                <a href="{{ route('revisores.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>



  
@stop