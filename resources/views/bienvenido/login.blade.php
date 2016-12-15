
<div class="row">                
   <div class="col s12 m7 l3 card-panel  bordes micarpanel" id="loginPrincipal">  
      
         
                   
      <div class="row">
         <div class="col s6 l6 m6  center waves-effect waves-teal btn-flat" onclick="mostrarDocente()" id="boxDocentes">
            <h6>Docente</h6>
         </div>

         <div class="col s6 l6 m6 waves-effect center waves-teal btn-flat " onclick="mostrarEstudiante()" id="boxEstudiantes">
            <h6>Estudiante</h6>
         </div>
      </div>
<div class="divider grey "></div>
<br>
      <div id="loginDocentes" class="row">
         

         <div class="col s12 m12 l12">
            <fieldset class="grey lighten-4" style="border-radius: 10px">
            {!! Form::open(['route'=> 'admin.login', 'method' => 'POST']) !!}
               {{ csrf_field() }}
               <div class="row">
                  <div class="col s12  centrar input-field">
                     <input id="UsuarioIdentificacion" type="email" name="UsuarioIdentificacion" class="validate">         
                     <label for="UsuarioIdentificacion">Correo</label>
                  </div>
               </div>

               <div class="row">
                  <div class="col s12  centrar input-field ">

                     <input id="password" type="password" name="password" class="validate" name="password">
                     <label for="password ">Contraseña</label>
                  </div>
               </div>

               @if (count($errors) > 0)
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               @endif

               <div class="row offset-m3">
                     <div class="col s12 m12 l12">
                        <button style="width: 100%" class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Entrar</button> 
                                      
                     </div>
                     <div class="col s1 m1 l1 offset-l11">
                       <i class="mdi-action-help blue-text" data-tooltip="Puedes ingresar con el correo y la contraseña que usas en el sistema S.C.A.D."  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>
                                      
                     </div>

               </div>

            {!! Form::close() !!}
             <p class="center"><a href="{{ url('http://docentes.univalleyumbo.com/login/recuperar') }}">¿Olvidaste tu contraseña?</a></p>
               
               </fieldset>
         </div>    
      </div>

      <div id="loginEstudiantes" class="row" style="display: none;">
      

         <div class="col s12 m12 l12">
            <fieldset class="grey lighten-4" style="border-radius: 10px">
            {!! Form::open(['route'=> 'user.login', 'method' => 'POST']) !!}
                  {{ csrf_field() }}

                  <div class="row">
                     <div class="col s12  centrar input-field {{ $errors->has('codigo') ? ' has-error' : '' }}">
                           <input id="codigo" type="text" name="codigo" pattern="[0-9/-]*" title="Ejemplo:1457930-5010" class="validate" value="{{ old('codigo') }}" required="">         
                           <label for="codigo">Código</label>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col s12  centrar input-field ">
                        <input id="password" type="password" class="validate" name="password" required="">
                        <label for="password ">Contraseña</label>
                     </div>
                  </div>

                  @if (count($errors) > 0)
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  @endif

                  <div class="row offset-m3">
                     <div class="col s12 m12 l12">
                        <button style="width: 100%" class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Entrar</button> 
                                      
                     </div>

                     <div class="col s1 m1 l1 offset-l11">
                       <i class="mdi-action-help blue-text" data-tooltip="inicio de sesión. Ejemplo: código: 12342013-2711, Nombre: Pepito Casas, contraseña: P12342013C"  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>
                                      
                     </div>

               </div>

            {!! Form::close() !!}

                 

                  <p class="center"><a href="www.google.com">¿Olvidaste tu contraseña?</a></p>

              
            </div>

            </fieldset>
         </div>
      </div>
   </div>          
</div>