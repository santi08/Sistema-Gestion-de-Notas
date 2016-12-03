<ul id="usuario" class="dropdown-content">
    <li>
      <a href="#!">Ver perfil</a></li>
    <li>
        <a href="{{ url('/logoutes') }}">Cerrar Sesión</a>
    </li>
    <li class="divider"></li>
</ul>

<div class="navbar-fixed" >
  <nav class=" gradient  s12 m3 l12 ">

    <div class="nav-wrapper">

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="">Ayuda<i class="material-icons left">help</i></a></li>
        <li><a class="dropdown-button" href="#!" data-constrainwidth="false" data-activates="usuario">

        <i class="material-icons prefix left">power_settings_new</i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>
<div class="row">
</div>
 

<ul id="slide-out" class="side-nav fixed gradient-side" style="width: 217px;">

    <li>
        <div class="userView">
            <div class="background center" style="margin-top: 4%;">
                <span class="white-text text-lighten-2 center"><i class="material-icons medium ">person</i></span>
            </div>
            <div><p class="white-text text-lighten-2" >
         
                {{Auth::user()->primerNombre}} {{Auth::user()->primerApellido}}
            
            </p></div>
        </div>
        </li>

        <li class="no-padding"><div class="divider"></div></li>

        <li class="mihover"><a href="{{url('/index')}}"  class="white-text text-lighten-2 waves-effect">Inicio<i class="material-icons left white-text text-lighten-4">home</i></a></li>
        
        <li class="no-padding mihover">
            <a href="{{route('admin.usuarios.asignaturasEstudiante')}}" class=" white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">assignment</i>Mis Asignaturas</a>
        </li>
           
        <li class="no-padding mihover">
            <a href="{{route('admin.informes.index')}}" class="white-text text-lighten-2 waves-effect" ><i class="material-icons white-text text-lighten-2">picture_as_pdf</i>Informes</a>
        </li>
</ul>
      