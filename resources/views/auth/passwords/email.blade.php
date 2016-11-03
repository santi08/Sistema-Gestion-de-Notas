<!DOCTYPE html>
<html lang="en">
<title>Iniciar Sesión</title>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/Materialize/css/materialize.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/styles.css')}}">
    <meta charset="utf-8">
    
</head>
<body  background= {{url("/img/fondo2.jpg")}}>

     
                <div class="row">
                    
                    <div class="col s9 m7 l4 card-panel centrar offset-s1 offset-l4 offset-m3 z-depth-3 bordes ">
                    <div class="row offset-m3"><h4>Restauración de contraseña</h4></div>
                        
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                             @endif
                                              

                        {!! Form::open(['url'=> '/password/email', 'method' => 'POST']) !!}

                             {{ csrf_field() }}

                            <div class="row">
                                <div class="col s12  centrar input-field {{ $errors->has('codigo') ? ' has-error' : '' }}">
                                    <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" required="">
                                    
                                    <label for="codigo">Correo</label>
                                </div>
                            </div>

                             @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="row offset-m3">
                                 <div class="col s6 offset-s4">
                                    <button class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Enviar link
                                   </button> 
                                      
                                </div>
                            </div>

                           {!! Form::close() !!}
                       
                       <!-- <form action="admin/login" method="POST">

                         

                        </form>   -->   

                    

                    </div>

                    
                </div>
        




    <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>

    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    
 </body>   
</html>

  


