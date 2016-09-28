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
 <div class="row">
 	<table class="col offset-s3 bordered ">
        <thead>
          <tr>
              <th data-field="id">Nombre Completo</th>
              <th data-field="name">codigo</th>
              <th data-field="email">correo</th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)
          <tr>
          	 <td> {{ $user-> firstname }}</td>
          	 <td> {{ $user-> codigo }}</td>
          	 <td> {{ $user-> email }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

 </div>
  
 

@endsection

 <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
 <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.js')}}"></script>

 <Script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
   
  });
       

   
 </Script>

</body>
</html>