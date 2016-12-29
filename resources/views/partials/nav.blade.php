
<aside id="left-sidebar-nav">
   <ul id="slide-out" class="side-nav fixed leftside-navigation gradient-side">

      <li class="user-details cyan darken-2">
        
         <div class="row" >
            <div class="col  s2 m2 l2" style="padding-left: 0.5px;">
                 <a href="#" class=""><i class="mdi-social-person white-text"></i></a> 
            </div>
            <div class="col col s8 m8 l8" >

                 
               <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" style="font-size: 15px;" data-activates="profile-dropdown">
                        
                  @if (Auth::guard('admin')->check())

                     {{Auth::guard('admin')->user()->usuarios[0]->Nombre}} 
                     {{Auth::guard('admin')->user()->usuarios[0]->Apellidos}}

                  @elseif (Auth::check())

                     {{Auth::user()->primerNombre}} {{Auth::user()->primerApellido}}
                  @endif
                  </a>
                  <p class="user-roal white-text">
                  @if (Auth::guard('admin')->check())

                     @if(Auth::guard('admin')->user()->rolAdministrador())
                              Administrador

                     @elseif(Auth::guard('admin')->user()->rolCoordinador())
                              Coordinador

                     @elseif(Auth::guard('admin')->user()->rolDocente())
                              Docente
                     @endif
                     
                     

                  @elseif (Auth::check())

                     Estudiante
                  @endif
                  </p>
            </div>
         </div>   
      </li>
       <li class="li-hover "><div class="divider"></div></li>
      <br> 
      <li class="mihover"><a href="{{url('/index')}}"  class="white-text waves-effect"><i class="mdi-action-home"></i>Inicio</a></li>
                
        @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
           <li>
            <a href="{{route('admin.asignaturas.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="mdi-av-my-library-books"></i>Asignaturas</a>
          </li>
        @endif

        @if (count(Auth::guard('admin')->user()->usuarios[0]->horarios)>0)

        <li class="no-padding mihover">
         
            <a href="{{route('matriculas.index')}}" class=" white-text text-lighten-2 waves-effect"><i class="mdi-notification-folder-special"></i>Mis Asignaturas</a>
          
            
          </li>
          
        @endif
         

        
         
         @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
          <li class="no-padding mihover">
            <a href="{{route('admin.profesores.index')}}" class="white-text text-lighten-2 waves-effect"><i class="mdi-social-people"></i>Profesores</a>
          </li>
          @endif

          @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
            <li class="no-padding mihover">
            <a href="{{route('admin.estudiantes.index')}}" class="waves-effect white-text text-lighten-2 "><i class="mdi-social-school"></i>Estudiantes</a>
          </li>
          @endif

         @if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
          <li class="no-padding mihover">
            <a href="{{route('admin.informes.index')}}" class="white-text text-lighten-2 waves-effect" ><i class="material-icons white-text text-lighten-2">picture_as_pdf</i>Informes</a>
          </li>
          @endif
</ul>
<div class="row">
  <div class="col s1 m1 l1">
    <a href="#" style="padding-top: 2px;" data-activates="slide-out" class="sidebar-collapse  btn-floating  waves-effect waves-light hide-on-large-only transparent"><i class="mdi-navigation-menu white-text"></i></a>
  </div>
</div>
  
</aside>      
    
  
