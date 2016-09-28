
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

       <div class="container">

                <div class="row">
                    <div class="">
                    <div class="col s12 m10 l4 card-panel centrar offset-l4 z-depth-3 bordes">
                        <div class="row">
                            <div class="col s12 input-field center">
                                <img class="responsive-img " src="{{ asset('img/notes.png')}}">
                                <div><h5>Sistema de gestion de notas</h5></div>
                                <div class="divider  red darken-4"></div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col s12 input-field"><i class="material-icons prefix">mail_outline</i>
                                <input id="email" type="email" class="validate">
                                
                                <label for="email">Correo</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 input-field "><i class="material-icons prefix icon-blue ">lock_outline</i>
                                <input id="password" type="password" class="validate ">
                                <label for="password ">Contraseña</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 input-field offset-l3">
                                <button class="btn waves-effect waves-light red darken-4 gradient" type="submit" name="action">Entrar
                                <i class="material-icons left ">exit_to_app</i>
                                </button>     
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 input-field offset-l3">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>

                    </div>

                    </div>
                </div>
        </div>
        








    <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    
 </body>   
</html>

  


