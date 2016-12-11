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
          <i class="material-icons left medium red-text"> warning</i><h6 class="red-text">¡Esta Accion no tiene retroceso!</h6>
        </a>
      </div>
      <br>
      <div> 
        <a>
          <center><h5>Eliminara a: <p class="black-text"> </p> </h5></center>
        </a>
      </div>
    </div> 

     <div class="col s12 m12 l12">
    <a href="#!" class="modal-action modal-close waves-effect waves-red green btn-flat">Cancelar</a>

    {!!link_to('#',$tittle='Eliminar',$attributes= ['id'=>'eliminar','class'=>'modal-action modal-close waves-effect waves-red red btn-flat btn-primary'],$secure=null)!!}
      
   </div> 

@endsection


 

