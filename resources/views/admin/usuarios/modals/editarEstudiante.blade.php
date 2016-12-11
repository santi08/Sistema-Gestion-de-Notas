@extends('layouts.modal')

@section('id')'editarEstudiante'
@overwrite

@section('contenido')
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token2">
<h4 class="center  red gradient darken-3 white-text" id="nombreEditar"></h4>
 

  <!-- inicio fila formulario -->
    {!! Form::open(['route'=>'admin.estudiantes.editar','method' => 'POST'])!!}
       
       <input type="hidden" name="id" id="id">
      <div class="row">
        <div class="col s6 input-field">
        {!!Form::text('primerNombre',null,['placeholder'=>'', 'id'=>'firstname', 'class'=>'validate','type'=>'text','required' ])!!}
        {!!Form::label('firstname','Primer Nombre',['class'=>'active', 'for'=>"first_name"])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('segundoNombre',null,['placeholder'=> "",'class'=> 'validate','id'=>'segundoNombre','type'=>'text'])!!}
        {!!Form::label ('secondname','Segundo Nombre',['for'=>'second_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('primerApellido',null,['placeholder'=>'','class'=>'validate','id'=>'primerApellido','type'=>'text','required'])!!}
        {!!Form::label ('lastname','Primer Apellido',['for'=> 'last_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::text('segundoApellido',null,['placeholder'=>'','class'=>'validate','id'=>'segundoApellido','type'=>'text','required'])!!}
        {!!Form::label ('secondlastname','Segundo Apellido',['for'=>'secondlast_name'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::label ('email','Correo Electronico',['for'=>'email'])!!}
        {!!Form::email('email',null,['placeholder'=>'','class'=>'validate','id'=>'email','type'=>'email','required'])!!}
        </div>
         <div class="col s6 input-field">
        {!!Form::number('codigo',null,['placeholder'=>'','class'=>'validate','id'=>'codigo2','type'=>'number','required'])!!}
        {!!Form::label ('codigo','codigo',['for'=> 'codigo'])!!}
        </div>
        <div class="col s6 input-field">
        {!!Form::hidden('id_programaAcademico',null,['class'=>'validate','id'=>'programaAcademico','type'=>'number','required'])!!}

        <select id="selectorPrograma2">
        <option value="" disabled selected> Seleccione Programa Academico</option> 
        </select>
       <!--  {!!Form::text('id_programaAcademico',null,['class'=>'validate','id'=>'id_programaAcademic  o','type'=>'number','required'])!!}
         <select id="selectorPrograma2">
          <option value="" disabled selected> Seleccione Programa Academico</option>
          @foreach ($programas as $programa)
          <option id="opcion" value="{{$programa->Id}}"> {{$programa->NombrePrograma}}</option>
          @endforeach
         </select>-->
        </div>
    

 <!--finaliza el boton crear-->

@overwrite

@section('footer')
        <div class="row">

         <div class="col s6 offset-s6 input-field">

          <button id="editar" type="submit" class="green btn red btn-primary"><i class="material-icons left">edit</i>Editar</button> 
         
        </div> 

        
        </div>
        
      </div> 
    {!! Form::close()!!}  
@overwrite