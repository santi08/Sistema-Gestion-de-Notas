
<aside id="left-sidebar-nav">
   <ul id="slide-out" class="side-nav fixed leftside-navigation gradient-side">

      <li class="user-details cyan darken-2">
        
         <div class="row">
            <div class="col  s2 m2 l2" style="padding-left: 0.5px;">
                 <a href="#" class=""><i class="mdi-social-person white-text"></i></a> 
            </div>
            <div class="col col s8 m8 l8">

                 
               <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" style="font-size: 15px;" data-activates="profile-dropdown">
                        
                  
                     {{Auth::user()->primerNombre}} {{Auth::user()->primerApellido}}
                  
                  </a>
                  <p class="user-roal white-text">
                 

                     Estudiante
                  
                  </p>
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
<a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>      
    
  
