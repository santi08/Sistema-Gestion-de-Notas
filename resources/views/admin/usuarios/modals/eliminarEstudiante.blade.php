@extends('layouts.modal')
@section('id')'eliminarEstudiante'
@overwrite
@section('contenido')
      <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
      <input type="hidden" name="id">
      <input type="hidden" id="nombre">
     <div class="row">
      <div>
        <a >
          <i class="material-icons left medium red-text"> warning</i><h4 class="red-text">¡Esta Accion no tiene retroceso!</h4>
        </a>
      </div>
      <br>
      <div> 
        <a>
          <center><h4>Eliminara a: <p class="black-text"> </p> </h4></center>
        </a>
      </div>
    </div> 
@endsection
@section('footer')
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red green btn-flat">Cancelar</a>

    {!!link_to('#',$tittle='Eliminar',$attributes= ['id'=>'eliminar','class'=>'modal-action modal-close waves-effect waves-red red btn-flat btn-primary'],$secure=null)!!}
      
   </div> 

@overwrite
