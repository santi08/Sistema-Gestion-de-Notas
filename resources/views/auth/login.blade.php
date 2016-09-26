
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/Materialize/css/materialize.css')}}">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/styles.css')}}">
    <meta charset="utf-8">
    
</head>
<body>
       
            <div class="row">
                <div class="col s12 m4 l4 card-panel  centrar offset-s2 ">
                    <form>

                        <div class="row">
                            
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate">
                                <label for="email">Correo</label> 
                            </div>
                 
                        </div>

                        <div class="row">
                             <div class="input-field col s12">
                                <input id="email" type="password" class="validate">
                                <label for="email">Contraseña</label> 
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col input-field">
                                <button class="btn waves-effect waves-light s2" type="submit" name="action">Ingresar
                                    <i class="material-icons right">send</i>
                                </button>
        
                            </div>
                        </div>

                        <div class="row">
                            <div class=" input-field col s6  offset-s3">
                                <p class="margin" >
                                    <a href="www.google.com">¿olvido su contraseña?</a>
                                </p>
                            </div> 
                        </div>

                        

                    </form>
                </div>
            </div>
        








    <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    
 </body>   
</html>

  


