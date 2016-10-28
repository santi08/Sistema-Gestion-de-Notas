
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/Materialize/css/materialize.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/styles.css')}}">
    <meta charset="utf-8">
    
</head>
<body class="gradient">

       

                <div class="row">
                    
                    <div class="col s9 m7 l4 card-panel centrar offset-s1 offset-l4 offset-m3 z-depth-3 bordes ">
                        
                       
                        <div class="row">
                            <a href="{{ url('login/docentes') }}">
                                <div class="col s6 waves-light-red center waves-effect waves-teal card" >
                                   <h5>Docentes</h5>
                                </div>
                            </a>
                             <a href="{{url('login/estudiantes')}}">
                                 <div class="col s6  waves-effect center waves-teal card">
                                    <h5>Estudiante</h5>
                                </div>
                            </a>
                        </div>
                        <div id="loginDocentes">

                        

                        {!! Form::open(['route'=> 'admin.login', 'method' => 'POST']) !!}

                             {{ csrf_field() }}

                            <div class="row">
                                <div class="col s12  centrar input-field">
                                    <input id="UsuarioIdentificacion" type="email" name="UsuarioIdentificacion" class="validate">
                                    
                                    <label for="UsuarioIdentificacion">Correo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12  centrar input-field ">
                                    <input id="password" type="password" name="password" class="validate" name="password">
                                    <label for="password ">Contraseña</label>
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
                                    <button class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Entrar
                                   </button> 
                                      
                                </div>
                            </div>

                           {!! Form::close() !!}
                       
                       <!-- <form action="admin/login" method="POST">

                         

                        </form>   -->   

                        <div class="row">
                            <div class="col s12 m12 l12 input-field center">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>
                        </div>



                    </div>

                    
                </div>
        




    <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>

    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    
 </body>   
</html>

  


