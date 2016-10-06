@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title> Estudiantes</title>
</head>
<body>
@section('titulo')
<center><h2>Estudiantes</h2></center>
@endsection

@section('content')
  <br> <br>

<!--campo buscar -->
 <div class="row">

  <div class="input-field col s3 ">
    <input id="last_name " type="text" class="validate ">
    <label for="last_name" class=" ">Codigo o Nombre <i class="material-icons"> search</i> </label>
  </div>

@include('admin.usuarios.crearEstudiante')
  
</div>
<!-- finaliza campo buscar -->

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
          <tr>
          	 <td> {{ $user-> firstname}} {{$user-> secondname}} {{$user-> lastname}}</td>
          	 <td> {{ $user-> codigo }}</td>
          	 <td> {{ $user-> email }}</td>
             <td>  <a class="btn-floating btn-small waves-effect waves-light green "><i class="material-icons">home</i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

 </div>
  
 {!! $users->render()!!}

@endsection

 <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
 <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.js')}}"></script>

<Script>
 $(document).ready(function(){
    $('.modal-trigger').leanModal();
  });
 </Script>

</body>
</html>