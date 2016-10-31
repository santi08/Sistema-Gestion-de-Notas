<<<<<<< HEAD
<!--aqui esta el boton de crear Usuario-->
  
  <div class="row ">
    <a href="#modal2"" class="btn-floating btn-small waves-effect waves-light green modal-trigger "><i class="material-icons">delete</i></a>
  </div> 
  
  <!-- Estructura Modal -->
  <div id="modal2" class="modal">
    <div class="modal-content ">
      <div class="row ">
       <div class="col s12 ">
       <p>Eliminara {{$user->firstname}} {{$user->secondname}} <i class="material-icons white left">delete<i> </p> 

       </div>
       
       <div class="modal-footer">
       <a href="#!" class="modal-action modal-close waves-effect waves-red red btn-flat">Cancelar</a>
       <a href="{{ route('admin.usuarios.destroy',$user->id)}}" class=" modal-action modal-close waves-effect waves-green green btn-flat">Aceptar</a>
       </div> 
=======
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
>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811
      </div>
    </div> 
@endsection
@section('footer')
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red green btn-flat">Cancelar</a>

    {!!link_to('#',$tittle='Eliminar',$attributes= ['id'=>'eliminar','class'=>'modal-action modal-close waves-effect waves-red red btn-flat btn-primary'],$secure=null)!!}
      
   </div> 

@overwrite
