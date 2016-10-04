  
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">Ver perfil</a></li>
    <li><a href="#!">Cerrar Sesión</a></li>
    <li class="divider"></li>
  
  </ul>

  <nav class=" gradient  s12 m3  ">
    <div class="nav-wrapper">

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="">Ayuda<i class="material-icons left">help</i></a></li>
        <li><a class="dropdown-button" href="#!" data-constrainwidth="false" data-activates="dropdown1">Carlos<i class="material-icons left">account_circle</i></a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
  </nav>
  
      <ul id="slide-out" class="side-nav fixed gradient-side ">
         <li class=""><a href="{{url('/')}}"  class="white-text text-lighten-2 waves-effect">Inicio<i class="material-icons left white-text text-lighten-4">home</i></a></li>


        <li class="no-padding"><div class="divider"></div></li>

        
        <li class="no-padding">
          <a href="{{route('admin.materiasIndex.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">library_books</i>Materias</a>
        </li>
        
        <li class="no-padding">
        <a href="{{route('admin.profesoresIndex.index')}}" class="white-text text-lighten-2 waves-effect"><i class="material-icons white-text text-lighten-2">supervisor_account</i>Profesores</a>
        </li>

        <li class="no-padding">
          <a href="{{route('admin.profesoresIndex.index')}}" class="waves-effect white-text text-lighten-2 "><span style="font-size: 2em; margin-right: 1em; margin-top: 4px;" class="icon-graduation-cap"></span>Estudiantes</a>
        </li>


        <li class="no-padding">
          <a href="{{route('admin.informesIndex.index')}}" class="white-text text-lighten-2 waves-effect" ><i class="material-icons white-text text-lighten-2">picture_as_pdf</i>Informes</a>
        </li>


        
      </ul>
      
    
  
