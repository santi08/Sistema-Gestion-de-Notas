@extends('layouts.app')
@section('title','Estudiantes')


@section('content')

  <br> <br>
<!--campo buscar y registrar-->
<div class="row">

  <div class="input-field col s3 ">
    <nav class="blue">
     <div class="nav-wrapper">     
        <div class="input-field" >
          <input name="search" onkeyup="buscar()"  id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
     </div>
    </nav>  

  </div>

  <div>
    @include('admin.usuarios.modals.crearEstudiante')
  </div>     
</div>
<!-- finaliza campo buscar y registrar -->
<hr>

<div class="row" id="Estudiantes">
 	<table class="col highlight responsive-table bordered">
    <thead>
      <tr>
       <th data-field="id">Nombre Completo</th>
       <th data-field="name">codigo</th>
       <th data-field="email">correo</th>
       <th data-field="accion">Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
        <tr>
          <td> {{ $user->firstname}} {{$user->secondname}} {{$user->lastname}}</td>
          <td> {{ $user->codigo }}</td>
          <td> {{ $user->email }}</td>
          <td>
           <a onClick="abrirModalEditar({{$user->id}})"  data-target='#editarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons">edit</i></a> 
           <a onClick="abrirModalEliminar({{$user->id}})" id="{{$user->id}}" data-target='#eliminarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons red">delete</i></a>
          </td> 
        </tr>
      @endforeach

    </tbody>
  </table>

</div>

 {!! $users->render()!!}
@include('admin.usuarios.modals.eliminarEstudiante')
@include('admin.usuarios.modals.editarEstudiante')
@overwrite

@section('scripts')
<script type="text/javascript">
 
function buscar(){
 
 var ruta = "{{ route('admin.usuarios.index')}}";
 var valor = $('#search').val();
 
  $.ajax({
      url:ruta,
      type: 'GET',
      dataType:'json',
      data:{valor:valor},
      success:function(data){
        $("#Estudiantes").html(data);
        
      }
     });
 

  }     

function abrirModalEliminar(id){
    var select1= $('select1').val();
    var ruta="{{route('admin.usuarios.destroy',['%iduser%'])}}" ;
    ruta = ruta.replace('%iduser%',id);
    var token = $('#token').val(); 

    $.get(ruta,function(res){
      var nombre = res.firstname+" "+res.secondname+" "+res.lastname;
      $("#nombre").val(res.id);
      $('p').text(nombre);
      $('#eliminarEstudiante').openModal();
      });

    }
    
  $('#eliminar').click(function(){

     var valor= $("#nombre").val();
      var ruta2="{{route('admin.usuarios.destroyupdate',['%iduser%'])}}" ;
      ruta2 = ruta2.replace('%iduser%',valor);
      var token = $('#token').val();

      $.ajax({
      url:ruta2,
      headers:{'X-CSRF-TOKEN': token},
      type: 'PUT',
      dataType:'json',
      data:{valor},
      success:function(){
        
        window.location= "{{route('admin.usuarios.index')}}";

        
      }
     });

  }) 
  
    
  function openModalCrear() {
    $('#crearEstudiante').openModal();
  }

  function abrirModalEditar(id){
   
    var ruta="{{route('admin.usuarios.edit',['%iduser%'])}}" ;
    ruta = ruta.replace('%iduser%',id);
   
   $.get(ruta,function(res){
    $('#id').val(res.id);
    nombre = res.firstname+" "+res.secondname+" "+res.lastname+" "+res.secondlastname;
    $('p').text(nombre);
    $("#firstname").val(res.firstname);
    $("#segundoNombre").val(res.secondname);
    $("#primerApellido").val(res.lastname);
    $("#segundoApellido").val(res.secondlastname);
     $("#email").val(res.email);
    $("#codigo2").val(res.codigo);
    $('#editarEstudiante').openModal();
   });
    
  }

</script> 


@endsection




 