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

<!--campo buscar y boton crear usuario estan en un solo div -->
 <div class="row">

  <div class="input-field col s3 ">
    <input id="last_name " type="text" class="validate ">
    <label for="last_name" class=" ">Codigo o Nombre <i class="material-icons"> search</i> </label>
  </div>

 <!--aqui esta el boton de crear Usuario-->
  
  <div class="row">
    <a class="col s3 offset-s3 green waves-effect waves-red btn modal-trigger " href="#modal1"> Registrar Estudiante</a> 
  </div> 
  
  <!-- Estructura Modal -->
  
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 class="center red">Registrar Estudiantes</h4>
         {!! Form::open(['route'=>'admin.usuarios.store','method' => 'POST'])!!}
      
      <div class="row">
        <div class="col s6 form-group">
        {!!Form::label ('firstname','Primer Nombre')!!}
        {!!Form::text('firstname',null,['class'=> 'form-control','placeholder'=> 'primer nombre','required'])!!}
        </div>
        <div class="col s6 form-group">
        {!!Form::label ('secondname','Segundo Nombre')!!}
        {!!Form::text('secondname',null,['class'=> 'form-control','placeholder'=> 'segundo nombre'])!!}
        </div>
        <div class="col s6 form-group">
        {!!Form::label ('lastname','Primer Apellido')!!}
        {!!Form::text('lastname',null,['class'=> 'form-control','placeholder'=> 'primer apellido','required'])!!}
        </div>
        <div class="col s6 form-group">
        {!!Form::label ('secondlastname','Primer Apellido')!!}
        {!!Form::text('secondlastname',null,['class'=> 'form-control','placeholder'=> 'segundo apellido','required'])!!}
        </div>
        <div class="col s6 form-group">
        {!!Form::label ('email','Correo Electronico')!!}
        {!!Form::email('email',null,['class'=> 'form-control','placeholder'=> 'example@gamil.com','required'])!!}
        </div>
         <div class="col s6 form-group">
        {!!Form::label ('codigo','codigo')!!}
        {!!Form::number('codigo','value',['class'=> 'form-control','placeholder'=> 'codigo','required'])!!}
        </div>
        <div class="col s6 form-group">
        {!!Form::label ('password','Contraseña')!!}
        {!!Form::password('password',['class'=> 'form-control','placeholder'=> '*******','required'])!!}
        </div> 
        <div class="col s6 offset-s6 form-group">
         {!!Form::submit('Registrar',['class'=>' green btn btn-primary'])!!}
      </div>
      <a href="#" class="col s6 offset-s6"> <i class="material-icons prefix"> playlist_add </i> Subir archivo plano</a>
      </div>
        {!! Form::close()!!}
    </div>
  </div>
 <!--finaliza el boton crear-->
</div>
<!-- finaliza campo buscar y crear-->

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