
@extends('layouts.app')
@section('title','Estudiantes')


@section('content')


  <br> <br>

  <br> <br>
<!--campo buscar y registrar-->
 <div class="input-field col s12">
 
    <select id="filtrarPeriodo">
      <option id="" value="" >Todos Los Programas 
        </option>
      @foreach($periodosAcademicos as $periodos) 
        <option id="periodo" value="{{$periodos->Id}}" >{{$periodos->Ano}} Periodo: {{$periodos-> Periodo}} 
        </option>
      @endforeach       
    </select>
    <label>periodo Academico</label>
  </div>

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

<input type="hidden" id="idPeriodo">

<div class="row" id="Estudiantes">
 	
  
<table>
    <thead>
      <tr>
       <th data-field="id">Nombre Completo</th>
       <th data-field="name">codigo</th>
       <th data-field="email">correo</th>
       <th data-field="accion">Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($estudiantes as $estudiante)
        <tr>
          <td> {{ $estudiante->primerNombre}} {{$estudiante->segundoNombre}} {{$estudiante->primerApellido}}</td>
          <td> {{ $estudiante->codigo }}</td>
          <td> {{ $estudiante->email }}</td>
          <td>
           <a onClick="abrirModalEditar({{$estudiante->id}})"  data-target='#editarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons">edit</i></a> 
           <a onClick="abrirModalEliminar({{$estudiante->id}})" id="{{$estudiante->id}}" data-target='#eliminarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons red">delete</i></a>
          </td> 
        </tr>
      @endforeach

    </tbody>
  </table>

</div>

{!! $estudiantes->render()!!}

@include('admin.usuarios.modals.eliminarEstudiante')
@include('admin.usuarios.modals.editarEstudiante')
@overwrite

@section('scripts')

<script type="text/javascript">

$('#filtrarPeriodo').change(function(){
var ruta = "{{route('admin.estudiantes.index')}}";
var ide = $(this).children(":selected").attr("value");
$('#idPeriodo').val(ide);

  $.ajax({
      url:ruta,
      type: 'get',
      dataType:'json',
      data:{ide:ide},
      success:function(data){
       $("#Estudiantes").html(data);
        
      }
     });
}); 


/*$('#filtrarPeriodo').change(function(){
    var idPeriodo=$(this).children(":selected").attr("value");
     $('#idPeriodo').val(idPeriodo);
   });*/

function buscar(){ 
 var ruta = "{{ route('admin.estudiantes.index')}}";
 var valor = $('#search').val();
 var ide = $('#idPeriodo').val();
 
  $.ajax({
      url:ruta,
      type: 'GET',
      dataType:'json',
      data:{valor:valor,ide:ide},
      success:function(data){
        $("#Estudiantes").html(data);
        
      }
     });
 

  }     

function abrirModalEliminar(id){
    var ruta="{{route('admin.estudiantes.destroy',['%iduser%'])}}" ;
    ruta = ruta.replace('%iduser%',id); 
    
    $.get(ruta,function(res){
      var nombre = res.primerNombre+" "+res.segundoNombre+" "+res.primerApellido;
      $("#nombre").val(res.id);
      $('p').text(nombre);
      $('#eliminarEstudiante').openModal();
      }); 

    }
    
  $('#eliminar').click(function(){

     var valor= $("#nombre").val();
      var ruta2="{{route('admin.estudiantes.destroyupdate',['%iduser%'])}}" ;
      ruta2 = ruta2.replace('%iduser%',valor);
      var token = $('#token').val();

      $.ajax({
      url:ruta2,
      headers:{'X-CSRF-TOKEN': token},
      type: 'PUT',
      dataType:'json',
      data:{valor},
      success:function(){
        
        window.location= "{{route('admin.estudiantes.index')}}";

        
      }
     });

  }) 
  
    
  function openModalCrear() {
    $('#crearEstudiante').openModal();
  }

  function abrirModalEditar(id){
   
    var ruta="{{route('admin.estudiantes.edit',['%iduser%'])}}" ;
    ruta = ruta.replace('%iduser%',id);
   
   $.get(ruta,function(res){
    $('#id').val(res.id);
    nombre = res.primerNombre+" "+res.segundoNombre+" "+res.primerApellido+" "+res.segundoApellido;
    $('p').text(nombre);
    $("#firstname").val(res.primerNombre);
    $("#segundoNombre").val(res.segundoNombre);
    $("#primerApellido").val(res.primerApellido);
    $("#segundoApellido").val(res.segundoApellido);
     $("#email").val(res.email);
    $("#codigo2").val(res.codigo);
    $('#editarEstudiante').openModal();
   });
    
  }

</script> 


@endsection




 