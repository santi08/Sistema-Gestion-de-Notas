@extends('layouts.app')
@section('title','Estudiantes')


@section('content')
  <br> <br>

<!--campo buscar y registrar-->
 <div class="row">

  <div class="input-field col s3 ">
    <input id="last_name " type="text" class="validate ">
    <label for="last_name" class=" ">Codigo o Nombre<i class="material-icons">search</i> </label>
  </div>

   @include('admin.usuarios.modals.crearEstudiante')
  <hr>

</div>
<!-- finaliza campo buscar y registrar -->

 <div class="row">
 	<table class="col highlight responsive-table bordered">
        <thead>
          <tr>
              <th data-field="id">Nombre Completo</th>
              <th data-field="name">codigo</th>
              <th data-field="email">correo</th>
              <th data-field="accion">Acciones</th>
          </tr>
        </thead>

        <tbody>

          @foreach($users as $user)
          @if($user->estado == '1')
          <tr>
             <td> {{ $user->firstname}} {{$user->secondname}} {{$user->lastname}}</td>
             <td> {{ $user->codigo }}</td>
             <td> {{ $user->email }}</td>
             <td>  @include('admin.usuarios.modals.eliminarEstudiante')</td>

             <!--<td> <a href="{{ route('admin.usuarios.destroy',$user->id)}}"" class="btn-floating btn-small waves-effect waves-light green "><i class="material-icons">delete</i></a></td> -->
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>

 </div>
  
 {!! $users->render()!!}

@endsection



 