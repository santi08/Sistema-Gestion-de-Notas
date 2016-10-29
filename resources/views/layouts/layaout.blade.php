<!DOCTYPE html>
<html>
<head>
  <title>Layout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/materialize/css/materialize.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
</head>
<body>


 <nav >
    <div class="nav-wrapper">
          <a href="#" class="right waves-effect waves-red "><i class="material-icons left ">power_settings_new</i> cerrar sesion</a> 
          <a href="#" class="right  waves-effect waves-red"><i class="material-icons left ">help</i>Ayuda</a> 
          <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons left">menu</i></a>
          @yield('titulo')
    </div> 

    <div> 
       <ul id="slide-out" class="side-nav fixed">
        
         <blockquote><li class="bold"><a href="#!" class="red-text waves-effect waves-red"><i class="material-icons">home</i>Sistema Gestion de Notas </a></li></blockquote>

     <li><div class="userView">
      <img class="background" src="http://www.fondosblackberry.com/user-content/uploads/wall/mid/67/rojo_gradiend_red.jpg">
      <a href="#!user"><img class="circle" src="https://soliq.uz/upload/iblock/bef/befe65f1973a62d8a655eea5b97ff8d4.png"></a>
      <a href="#!name"><span class="black-text name">Kevin Cardona</span></a>
      <a href="#!email"><span class="black-text email">kevincardon@gmail.com</span></a>
    </div></li>

   
    <blockquote><a href="#!" class="waves-effect waves-red red-text "><i class="material-icons left">toc</i>Informes</a></blockquote>
    <!--<blockquote><a href="#!" class="waves-effect waves-teal red-text "><i class="material-icons left">work</i>Profesores </a></blockquote>
    <blockquote><a href="#!" class="waves-effect waves-teal red-text "><i class="material-icons left">movie</i>Materias </a> </blockquote>-->
    
   <!-- <div>
     <blockquote>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header waves-effect waves-teal">Informes<i class="material-icons left"> toc</i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!"> Por Programa</a></li>
                <li><a href="#!"> Por Materia</a></li>
                <li><a href="#!"> Por Estudiante</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
     </blockquote>
   </div>-->

   <div>
    <blockquote>
     <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header waves-effect waves-red red-text">Estudiantes<i class="material-icons prefix"> perm_identity </i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">Agregrar</a></li>
                <li><a href="#!">Consultar</a></li>
                <li><a href="#!">Editar</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
   </blockquote> 
   </div> 

   <div>
    <blockquote>
     <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header waves-effect waves-red">Profesores<i class="mdi-navigation-arrow-drop-down"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
   </blockquote> 
   </div> 

   <div>
    <blockquote>
     <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header waves-effect waves-red">Materias<i class="mdi-navigation-arrow-drop-down"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">First</a></li>
                <li><a href="#!">Second</a></li>
                <li><a href="#!">Third</a></li>
                <li><a href="#!">Fourth</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
   </blockquote> 
   </div>  
  
  </nav>

  @yield('content')


 <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
 <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.js')}}"></script>
 
 <script> 

$('.button-collapse').sideNav();
  $('.collapsible').collapsible('true');
 @yield('script')

 </script>
</body>
</html>

