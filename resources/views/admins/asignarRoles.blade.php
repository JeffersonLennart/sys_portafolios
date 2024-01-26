@extends('adminlte::page')

@section('title', 'Asignar Roles')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
<h1 class="text-center"><b>Asignación de Roles a Docentes</b></h1>
@stop

@section('content')
<table id="tabla" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>                
            <th>Asignar Rol</th>                
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol }}</td>                
                <td>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-user-id="{{ $user->id }}">
                    Asignar
                </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignación de Rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="Formulario" action="{{ route('admins.updateRole') }}" method="POST">
              @csrf
              @method('PUT')
              <!-- Campo oculto para el ID del usuario -->
              <input type="hidden" name="id" id="user_id">            
                <select class="form-select" name="rol" aria-label="Default select example">
                    {{-- <option selected>Open this select menu</option> --}}
                    <option value="Docente">Docente</option>
                    <option value="Docente,Revisor">Docente,Revisor</option>
                    <option value="Docente,Revisor,Administrador">Docente,Revisor,Administrador</option>
                </select>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  
@stop

@section('css')
    # Para bootstrap
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@stop

@section('js')
    <!-- Para bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Para el datatable -->
    <script src={{ asset('js/datatable.js') }}></script>               
    <!-- Para manejar el envio de datos al cambiar un rol -->
    <script>
       $(document).ready(function () {
        var userId; // Variable para almacenar el ID del usuario seleccionado

        // Maneja la apertura del modal
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            userId = button.data('user-id'); // Obtiene el ID del atributo de datos

            // Asigna el ID del usuario al campo oculto en el formulario
            $('#user_id').val(userId);
        });        
        });

    </script>
@stop