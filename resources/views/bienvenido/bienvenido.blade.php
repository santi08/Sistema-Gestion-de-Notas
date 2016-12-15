<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Iniciar Sesión</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href= "{{asset('plugins/bienvenido/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/bienvenido/css/style.css')}}">
   <link href="{{ asset('plugins/MaterializeAdmin/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/custom/custom.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

	
	
    
</head>

<body>

<div class="row">
<div class="col s12 m12 l12">

<div class="row">
    <div class="login col s12">
       <div class="top">
          <h1 id="title" class="hidden"><span id="logo"> <span>Bienvenido</span></span></h1>
       </div>
       <div class="login-box animated fadeInUp">
               
           @include('bienvenido.login')   
        </div>
  </div>
</div>
   
<div class="row">
   <div class="col s12 m12 l12">
      <footer class="page-footer gradient">
          <div class="container">
            <div class="row">
              <div class="col l6 s12 ">
                <h5 class="white-text">Sistema Control Academico Universitario (S.C.A.U)</h5>
                <h5 class="grey-text text-lighten-4">Desarrolladores</h5>
                <p class="grey-text text-lighten-4">Kevin Cardona, Santiago Guarín, Carlos Almario</p>
                
              </div>
              
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright todos los derechos reservados, Universidad del Valle Sede Yumbo
            <p class="grey-text text-lighten-4 right">scau.soporte@gmail.com</p>
            </div>
          </div>
        </footer>
   </div>
</div>
  
        </div>
</div>


<script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
<script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.css"></script>
<script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/materialize.js')}}"></script>
<script>


     
$('.carousel.carousel-slider').carousel({full_width: true});
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
    	 $('.slider').slider({full_width: true});
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

<script type="text/javascript">

        var docente = document.getElementById('loginDocentes');
        var estudiante= document.getElementById('loginEstudiantes');

        function mostrarDocente() {
            
                docente.style.display="block";
                estudiante.style.display="none";
                boxDocentes.style.backgroundColor = '#e0e0e0';
                boxEstudiantes.style.backgroundColor = 'white';

           
        }

        function mostrarEstudiante() {
            
                docente.style.display="none";
                estudiante.style.display="block";
                boxEstudiantes.style.backgroundColor = '#e0e0e0';
                boxDocentes.style.backgroundColor = 'white';
                

           
        }

    </script>

   <script type="text/javascript">
      
       $(document).ready(function() {
             boxDocentes.style.backgroundColor = '#e0e0e0';
             boxEstudiantes.style.backgroundColor = 'while';
        });


       $(document).ready(function(){

        
        $('#codigo').keyup(function (){
          this.value = (this.value + '').replace(/[^0-9^-]/g, '');
        });

       });

    </script>


</body>
</html>