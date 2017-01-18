<aside id="left-sidebar-nav">
   <ul id="slide-out" class="side-nav fixed leftside-navigation gradient-side">

      <li class="user-details cyan darken-2">
        
         <div class="row">
            <div class="col  s2 m2 l2" style="padding-left: 0.5px;">
                 <a href="#" class=""><i class="mdi-social-person white-text"></i></a> 
            </div>

            <div class="col s10 m10 l10"> 
               <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn active" href="#" style="font-size: 15px;" data-activates="profile-dropdown"><i class="mdi-navigation-arrow-drop-down right"></i>

                    {{Auth::user()->primerNombre}}
                    {{Auth::user()->primerApellido}}
                  
               </a>
                  <p class="user-roal white-text">
                     Estudiante
                  </p>

               <ul id="profile-dropdown" class="dropdown-content active" style="width: 171px; position: absolute; top: 807.219px; left: 9.45313px; opacity: 1; display: block;">
                        <li><a onClick="verPerfil()" class="-text">Ver Perfil</a>
                        </li>
                        <li><a onClick="modificarContrasena(1)" class="-text">Modificar Contraseña</a>
                        </li>
               </ul>
            </div>
         </div>   
      </li>

      <li class="mihover bold active"><a href="{{url('/index')}}"  class="white-text waves-effect"><i class="mdi-action-home"></i>Inicio</a></li>
      
      <li class="li-hover "><div class="divider"></div></li>

<br>
 
      <li class="no-padding mihover">
         <a href="{{route('admin.usuarios.asignaturasEstudiante')}}" class=" white-text text-lighten-2 waves-effect"><i class="mdi-notification-folder-special"></i>Mis Asignaturas</a>   
      </li>          
</ul>

<a href="#" data-activates="slide-out" class="sidebar-collapse btn-flat hide-on-large-only transparent"><i class="mdi-navigation-menu"></i></a>

</aside>

   
    
  
