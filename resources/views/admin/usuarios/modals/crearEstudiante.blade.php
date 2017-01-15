
<!-- Estructura Modal -->
<div id="crearEstudiante" class="modal">
   <div class="modal-content ">
      <h4 class="center white-text gradient">Registrar Estudiantes</h4>

      <div class="row">
         <div class="col s12 m12 l12">
               
            {!! Form::open(['route'=>'admin.estudiantes.store','method' => 'POST'])!!}

               <!-- inicio fila formulario -->
               <div class="row">
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::text('primerNombre',null,['class'=>'validate','id'=>'first_name','type'=>'text','required'])!!}
                    {!!Form::label('firstname','Primer Nombre',['class'=>'active', 'for'=>"first_name"])!!}
                  </div>
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::text('segundoNombre',null,['class'=> 'validate','id'=>'second_name','type'=>'text'])!!}
                     {!!Form::label ('secondname','Segundo Nombre',['for'=>'second_name'])!!}
                  </div>
               </div>

               <div class="row">
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::text('primerApellido',null,['class'=>'validate','id'=>'last_name','type'=>'text','required'])!!}
                     {!!Form::label ('lastname','Primer Apellido',['for'=> 'last_name'])!!}
                  </div>
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::text('segundoApellido',null,['class'=>'validate','id'=>'secondlast_name','type'=>'text','required'])!!}
                     {!!Form::label ('secondlastname','Segundo Apellido',['for'=>'secondlast_name'])!!}
                     
                  </div>
               </div>

               <div class="row">
                  <div class="col s6 m6 l6  input-field">
                      {!!Form::label ('email','Correo Electronico',['for'=>'email'])!!}
                     {!!Form::email('email',null,['class'=>'validate','id'=>'secondlast_name','type'=>'email','required'])!!}
                  </div>
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::number('codigo',null,['class'=>'validate','id'=>'codigo','type'=>'number','required'])!!}
                     {!!Form::label ('codigo','Código',['for'=> 'codigo'])!!}
                     
                  </div> 
               </div>  
                  
               <div class="row">
                  <div class="col s6 m6 l6 input-field">
                     {!!Form::hidden('id_programaAcademico',null,['class'=>'validate','id'=>'id_programaAcademico','type'=>'number','required'])!!}
                     <select id="selectorPrograma1" required>
                        <option class="validate required" value="" disabled selected> Seleccione Programa Academico</option>
                        @foreach ($programas as $programa)
                           <option id="opcion" value="{{$programa->CodigoPrograma}}"> {{$programa->NombrePrograma}}</option>
                        @endforeach
                     </select>
                  </div>
              
                  <!-- fila botones -->
                  <div class="col s3 l3 m3 input-field ">
                     <button type="submit" class="waves-effect waves-light btn teal darken-1"><i class="material-icons left">save</i>Registrar</button>
                  </div>
               </div>
            {!! Form::close()!!}       
         </div>
      </div>    
               
  

 <div class="row">
   <div class="col s12 m12 l12" style="max-height: 50%"> 

      <fieldset class="grey lighten-4">  
         <legend data-toggle="collapse" style="cursor: pointer" class="" >Registrar por archivo</legend>
         <div class="row">
            <div class="col s9 m9 l9">
               {!! Form::open(['route'=>'admin.estudiantes.procesarArchivo','method' => 'POST','id'=>'formularioSubir','files'=>'true'])!!}
      
                  <div class="file-field input-field">
                     <div class="btn blue-grey darken-1">
                        <span class="">Elegir Archivo</span>
                        <input type="file" required="" accept=".txt" name="file" id="file"> <i class=" mdi-editor-insert-drive-file left"></i> 
                     </div>
                     <div class="file-path-wrapper">
                        <input class="file-path validate"  type="text">
                     </div>
                  </div>
            </div>

            <div class="col s3 m3 l3 input-field">
               <button type='submit' class="waves-effect waves-light btn teal darken-1">Enviar<i class="mdi-content-send  right"></i></button>
            </div>
         </div>
               {!! Form::close()!!}
      </fieldset> 

  </div>
  </div>
  

        
  </div>
</div> 
  
 <!--finaliza el boton crear-->

