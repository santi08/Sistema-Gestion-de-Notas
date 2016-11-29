
<ul id="usuario" class="dropdown-content">
    <li>
      <a href="#!">Ver perfil</a></li>
    <li>
    
      @if (Auth::guard('admin')->check())
          <a href="{{url('/logoutdo')}}">
      @elseif (Auth::check())
          <a href="{{ url('/logoutes') }}">   
      @endif
        Cerrar Sesión
          </a>
    </li>
    <li class="divider"></li>
</ul>



<div class="navbar-fixed" >
  <nav class=" gradient  s12 m3 l12 " style="height: 8%; background: img/fon.png ">

    <div class="nav-wrapper">

      <ul id="nav-mobile" class="right hide-on-med-and-down" >
        <li><a href="" style="font-size: 1rem;">Ayuda<i class="material-icons left" style="font-size: 1.5rem;">help</i></a></li>
        <li><a class="dropdown-button" href="#!" data-constrainwidth="false" data-activates="usuario">

        <i class="material-icons prefix left" style="font-size: 1.5rem;">power_settings_new</i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse" ><i class="material-icons" >menu</i></a>
    </div>
  </nav>
</div>
<div class="row">
</div>
 

<ul id="slide-out" class="side-nav fixed gradient-side" style="width: 216px; height: 97%; margin-top: 4%;">

    <li>
        <div class="userView">
            <div class="background" >

              <img src="{{ asset('img/fondo2.jpg')}}">
                
            </div>
            
            <div><p class="white-text text-lighten-2" style="font-size: 0.7rem; ">
            <span class="white-text text-lighten-2"><i class="material-icons small ">person</i></span>

            @if (Auth::guard('admin')->check())

              {{Auth::guard('admin')->user()->usuarios[0]->Nombre}} 
              {{Auth::guard('admin')->user()->usuarios[0]->Apellidos}}

              @elseif (Auth::check())

                {{Auth::user()->primerNombre}} {{Auth::user()->primerApellido}}
           
              @endif
            </p></div>
        </div>

        </li>
        <br>

          <li class="mihover"><a href="{{url('/index')}}"  class="white-text text-lighten-2 waves-effect">Inicio<i class="material-icons left white-text text-lighten-4">home</i></a></li>
        

          

        @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
           <li class="no-padding mihover">
            <a href="{{route('admin.asignaturas.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">library_books</i>Asignaturas</a>
          </li>
        @endif

        @if (count(Auth::guard('admin')->user()->usuarios[0]->horarios)>0)

        <li class="no-padding mihover">
         
            <a href="{{route('matriculas.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">assignment</i>Mis Asignaturas</a>
          
            
          </li>
          
        @endif
         

        
         
         @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
          <li class="no-padding mihover">
            <a href="{{route('admin.profesores.index')}}" class="white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">supervisor_account</i>Profesores</a>
          </li>
          @endif

          @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
            <li class="no-padding mihover">
            <a href="{{route('admin.estudiantes.index')}}" class="waves-effect white-text text-lighten-2 "><span style="font-size: 2em; margin-right: 1em; margin-top: 4px;" class="icon-graduation-cap"></span>Estudiantes</a>
          </li>
          @endif
         
          <li class="no-padding mihover">
            <a href="{{route('admin.informes.index')}}" class="white-text text-lighten-2 waves-effect" ><i class="material-icons white-text text-lighten-2">picture_as_pdf</i>Informes</a>
          </li>
</ul>
      
    
  
