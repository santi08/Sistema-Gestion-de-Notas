  
  <ul id="usuario" class="dropdown-content">
    <li>
    <a href="#!">Ver perfil</a></li>
    <li>
    @if (isset(Auth::guard('admin')->user()->usuarios[0]->Nombre))

            <a href="{{ url('/logoutdo') }}">
        
          @elseif (isset(Auth::user()->firstname))

           <a href="{{ url('/logoutes') }}">
           
          @endif
      
        Cerrar Sesión
        </a>
      </li>
    <li class="divider"></li>
  

    <li><a href="#!">Ver perfil</a></li>
    <li><a href="#!">Cerrar Sesión</a></li>
    <li class="divider"></li> 
  </ul>


<div class="navbar-fixed">
  <nav class=" gradient  s12 m3 l12 ">

    <div class="nav-wrapper">

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="">Ayuda<i class="material-icons left">help</i></a></li>
        <li><a class="dropdown-button" href="#!" data-constrainwidth="false" data-activates="usuario">

        
          @if (Auth::guard('admin')->check())

            {{Auth::guard('admin')->user()->usuarios[0]->Nombre}}
        
          @elseif (Auth::check())

            {{Auth::user()->firstname}}
           
          @endif
           
           
           
           
        <i class="material-icons prefix left">account_circle</i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>
  
  
      <ul id="slide-out" class="side-nav fixed gradient-side ">
         <li class=""><a href="{{url('/')}}"  class="white-text text-lighten-2 waves-effect">Inicio<i class="material-icons left white-text text-lighten-4">home</i></a></li>
        

        <li class="no-padding"><div class="divider"></div></li>

        
        <li class="no-padding">
          <a href="{{route('admin.materiasIndex.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">library_books</i>Asignaturas</a>
        </li>
        
        <li class="no-padding">
        <a href="{{route('admin.profesoresIndex.index')}}" class="white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">supervisor_account</i>Profesores</a>
        </li>

        <li class="no-padding">
          <a href="{{route('admin.usuarios.index')}}" class="waves-effect white-text text-lighten-2 "><span style="font-size: 2em; margin-right: 1em; margin-top: 4px;" class="icon-graduation-cap"></span>Estudiantes</a>
        </li>


        <li class="no-padding">
          <a href="{{route('admin.informesIndex.index')}}" class="white-text text-lighten-2 waves-effect" ><i class="material-icons white-text text-lighten-2">picture_as_pdf</i>Informes</a>
        </li>


        
      </ul>
      
    
  
