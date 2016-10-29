
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
                            <div class="col s6 waves-light-red center waves-effect waves-teal card" onclick="mostrarDocente()">
                               <h5>Docente</h5>
                            </div>

                             <div class="col s6  waves-effect center waves-teal card" onclick="mostrarEstudiante()">
                                <h5>Estudiante</h5>
                            </div>
                        </div>
                        <div id="loginDocentes">
                        {!!Form::open([ 'method' =>'POST','class'=>'col s12', ])!!}      
                        <div class="row">
                            <div class="col s12  centrar input-field">
                                <input id="email" type="email" class="validate">
                                
                                <label for="email">Correo</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12  centrar input-field ">
                                <input id="password" type="password" class="validate ">
                                <label for="password ">Contraseña</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field ">
                                <button class="btn waves-effect waves-light waves-green  boton red darken-4" type="submit" name="action">Entrar
                                
                                </button>     
                            </div>
                        </div>
                        
                        {!!Form::close()!!}

                        <div class="row">
                            <div class="col s12 m12 l12 input-field center">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>
                        </div>

                        <div id="loginEstudiantes" style="display: none;">
                        {!!Form::open([ 'method' =>'POSt','class'=>'register-form'])!!}      
                        <div class="row">
                            <div class="col s12  centrar input-field">
                                <input id="email" type="email" class="validate">
                                
                                <label for="email">Código</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12  centrar input-field ">
                                <input id="password" type="password" class="validate ">
                                <label for="password ">Contraseña</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field ">
                                <button class="btn waves-effect waves-light  boton red darken-4" type="submit" name="action">Entrar
                                
                                </button>     
                            </div>
                        </div>
                        
                        {!!Form::close()!!}

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

    <script type="text/javascript">

        var docente = document.getElementById('loginDocentes');
        var estudiante= document.getElementById('loginEstudiantes');

        function mostrarDocente() {
            
                docente.style.display="block";
                estudiante.style.display="none";

           
        }

        function mostrarEstudiante() {
            
                docente.style.display="none";
                estudiante.style.display="block";

           
        }
        

         



    </script>
    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    
 </body>   
</html>

  


