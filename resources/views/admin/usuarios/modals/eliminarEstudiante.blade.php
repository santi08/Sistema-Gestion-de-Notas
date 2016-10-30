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
      </div>
    </div>
  </div>
 <!--finaliza el boton crear-->