@extends('layouts.layaout')

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


 <!-- Boton Para Modal -->
 <div class="row">
   	<a class="col s3 offset-s7 waves-effect waves-red btn modal-trigger " href="#modal1">Registrar Estudiante</a> 
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
	       {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	    </div>

	    <a href="#" class="col s6 offset-s6"> <i class="material-icons prefix"> playlist_add </i> Subir archivo plano</a>
      </div>
      
   
        {!! Form::close()!!}
    </div>

    
  </div>
         


@endsection

 <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
 <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.js')}}"></script>

 <Script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
       

   
 </Script>

</body>
</html>





 
        

