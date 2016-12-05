
<!-- Estructura Modal -->
<div id="crearEstudiante" class="modal">
   <div class="modal-content ">
      <h4 class="center  red gradient darken-3 white-text">Registrar Estudiantes</h4>
       
      {!! Form::open(['route'=>'admin.estudiantes.store','method' => 'POST'])!!}

<!-- inicio fila formulario -->
      <div class="row">
         <div class="col s6 input-field">
            {!!Form::text('primerNombre',null,['class'=>'validate','id'=>'first_name','type'=>'text','required' ])!!}
            {!!Form::label('firstname','Primer Nombre',['for'=>"first_name"])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::text('segundoNombre',null,['class'=> 'validate','id'=>'second_name','type'=>'text'])!!}
            {!!Form::label ('secondname','Segundo Nombre',['for'=>'second_name'])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::text('primerApellido',null,['class'=>'validate','id'=>'last_name','type'=>'text','required'])!!}
            {!!Form::label ('lastname','Primer Apellido',['for'=> 'last_name'])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::text('segundoApellido',null,['class'=>'validate','id'=>'secondlast_name','type'=>'text','required'])!!}
            {!!Form::label ('secondlastname','Segundo Apellido',['for'=>'secondlast_name'])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::label ('email','Correo Electronico',['for'=>'email'])!!}
            {!!Form::email('email',null,['class'=>'validate','id'=>'secondlast_name','type'=>'email','required'])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::number('codigo',null,['class'=>'validate','id'=>'codigo','type'=>'number','required'])!!}
            {!!Form::label ('codigo','codigo',['for'=> 'codigo'])!!}
         </div>
         <div class="col s6 input-field">
            {!!Form::hidden('id_programaAcademico',null,['class'=>'validate','id'=>'id_programaAcademico','type'=>'number','required'])!!}
            <select id="selectorPrograma1">
               <option class="validate required" value="" disabled selected> Seleccione Programa Academico</option>
               @foreach ($programas as $programa)
                  <option id="opcion" value="{{$programa->CodigoPrograma}}"> {{$programa->NombrePrograma}}</option>
               @endforeach
            </select>
         </div>
         
        <!-- fila botones -->
         <div class="col s3 l3 m3 input-field ">
            <button type="submit" class="green btn"><i class="material-icons left">save</i>Registrar</button>
         </div>
      {!! Form::close()!!}
          
        
        <!-- fin fila botones-->
   </div>

 
   <div class="col s12 m12 l12" style="max-height: 50%"> 

      <fieldset>  
         <legend data-toggle="collapse" style="cursor: pointer" class="" >Registrar por archivo</legend>
         <div class="row">
            <div class="col s9 m9 l9">
               {!! Form::open(['route'=>'admin.estudiantes.procesarArchivo','method' => 'POST','id'=>'formularioSubir','files'=>'true'])!!}
        <!--<div>
          <input  class="filestyle" type="file" accept=".txt" name="file" id="file">
        </div>-->
               <div class="file-field input-field">
                  <div class="btn btn-small">
                     <span>Elegir Archivo</span>
                     <input type="file" accept=".txt" name="file" id="file">
                  </div>
                  <div class="file-path-wrapper">
                     <input class="file-path validate" type="text">
                  </div>
               </div>

            </div>
            <div class="col s3 m3 l3 input-field">
               <button type='submit' class="btn btn-primary">Enviar</button>
            </div>
         </div>
      {!! Form::close()!!}
     </fieldset> 

  </div>
  

        
  </div>
</div> 
  
 <!--finaliza el boton crear-->

