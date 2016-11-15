<!--aqui esta el boton de crear Usuario-->
  <div class="row ">
    <a onClick='openModalCrear()' class="col s3 l3 m3 offset-s9 offset-l9 offset-m9 green waves-effect waves-green btn modal-trigger" data-target='#crearEstudiante'>Registrar Estudiante</a> 
  </div> 
 <!-- fin boton crear --> 

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
          <option id="opcion" value="{{$programa->Id}}"> {{$programa->NombrePrograma}}</option>
          @endforeach
         </select>
        </div>
         
        <!-- fila botones -->
        <div class="row">
          <div class="col s5 l5 m5 offset-l6 offset-s6 input-field">
           <button type="submit" class="green btn"><i class="material-icons left">save</i>Registrar</button>
           {!! Form::close()!!}
          </div>
        </div> 
        <!-- fin fila botones-->
    </div>



  <div class="col s12 m12 l12">
    <fieldset >  

      <legend data-toggle="collapse" style="cursor: pointer" class="" data-target="#RegistrarPorArchivo">Registrar por archivo</legend>

      <div id="RegistrarPorArchivo" class="collapse">
        {!! Form::open(['route'=>'admin.estudiantes.procesarArchivo','method'=>'POST','files' => 'true']) !!}
        <div class="form-group">
          <input class="filestyle" type="file" accept=".txt" name="file" id="file" data-buttonText="Escoger archivo">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>

         {!! Form::close() !!}
         </div>


      </div>

     </fieldset>

  <!-- <fieldset>  
      <legend data-toggle="collapse" style="cursor: pointer" class="" data-target="#RegistrarPorArchivo">Registrar por archivo</legend>
      <div id="RegistrarPorArchivo" class="collapse">
        <div class="form-group">
          <input class="filestyle" type="file" accept=".txt" name="file" id="file" data-buttonText="Escoger archivo">
        </div>
        <button onClick="abrirCargarArchivo()" data-target='#cargarEstudiante' class=" btn btn-primary modal-trigger">Enviar</button>
      </div>
     </fieldset>-->

  </div>

        
  </div>
</div>
  
 <!--finaliza el boton crear-->

