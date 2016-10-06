<!--aqui esta el boton de crear Usuario-->
  
  <div class="row ">
    <a class="col s3 offset-s3 green waves-effect waves-green btn modal-trigger " href="#modal1"> Registrar Estudiante</a> 
  </div> 
  
  <!-- Estructura Modal -->
  <div id="modal1" class="modal">
    <div class="modal-content ">
      <h4 class="center  red gradient darken-3 white-text">Registrar Estudiantes</h4>
        <hr>
         {!! Form::open(['route'=>'admin.usuarios.store','method' => 'POST'])!!}
  <!-- inicio fila formulario -->
      <div class="row">
        <div class="col s6 input-field">
        {!!Form::text('firstname',null,['class'=>'validate','id'=>'first_name','type'=>'text','required' ])!!}
        {!!Form::label('firstname','Primer Nombre',['for'=>"first_name"])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('secondname',null,['class'=> 'validate','id'=>'second_name','type'=>'text'])!!}
        {!!Form::label ('secondname','Segundo Nombre',['for'=>'second_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('lastname',null,['class'=>'validate','id'=>'last_name','type'=>'text','required'])!!}
        {!!Form::label ('lastname','Primer Apellido',['for'=> 'last_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('secondlastname',null,['class'=>'validate','id'=>'secondlast_name','type'=>'text','required'])!!}
        {!!Form::label ('secondlastname','Primer Apellido',['for'=>'secondlast_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::label ('email','Correo Electronico',['for'=>'email'])!!}
        {!!Form::email('email',null,['class'=>'validate','id'=>'secondlast_name','type'=>'email','required'])!!}
        </div>
         <div class="col s6 input-field">
        {!!Form::number('codigo',null,['class'=>'validate','id'=>'codigo','type'=>'number','required'])!!}
        {!!Form::label ('codigo','codigo',['for'=> 'codigo'])!!}
        </div>
       <!-- <div class="col s6 input-field">
        {!!Form::password('password',['class'=>'validate','id'=>'pass','type'=>'password','required'])!!}
        {!!Form::label ('password','Contraseña',['for'=>'pass'])!!}
        </div> -->
        <!-- fin fila formulario -->

        <!-- fila botones -->
        <div class="row">

         <div class="col s6 offset-s6 input-field">
         {!!Form::submit('Registrar',['class'=>' green btn btn-primary'])!!}
        </div>

        <div class="col s6 offset-s6 input-field">
        <hr>
        <a>{!! Form::file('text')!!}</a>
        </div> 
        <!-- fin fila botones-->
        </div>
        
      </div>
        {!! Form::close()!!}
    </div>
  </div>
 <!--finaliza el boton crear-->