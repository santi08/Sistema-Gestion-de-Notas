
@extends('layouts.app')
@section('title','Estudiantes')
@section('content')
<h3 class="center">Estudiantes</h3>
<!--campo buscar y registrar-->
 
     

<!-- finaliza campo buscar y registrar -->

  <br> <br>

  <br> <br>
<!--campo buscar y registrar-->
 <div class="input-field col s12">
 
    <select id="filtrarPrograma">
      <option id="" value="" disabled selected>Seleccione un Programa 
        </option>
      @foreach($programas as $programa) 
        <option id="periodo" value="{{$programa->Id}}" >{{$programa->NombrePrograma}} 
        </option>
      @endforeach       
    </select>
    <label>periodo Academico</label>
  </div>


<div class="row">
  <div class="input-field col s3 ">
    <nav class="blue">
     <div class="nav-wrapper">     
        <div class="input-field">
          <input name="search" onkeyup="buscar()"  id="search" type="search">
          <label for="search"><i class="material-icons">search</i></label>       
        </div>
     </div>
    </nav>  

  </div>

  <div>
    @include('admin.usuarios.modals.crearEstudiante',['programas' => $programas])
  </div>     

</div>
<hr>

<input type="hidden" id="idPrograma">

<div class="row" id="Estudiantes">
 

<table>
    <thead>
      <tr>
       <th data-field="id">Nombre Completo</th>
       <th data-field="name">Código</th>
       <th data-field="email">correo</th>
       <th data-field="programa">Programa Académico</th>
       <th data-field="accion">Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($estudiantes as $estudiante)
        <tr>
          <td> {{ $estudiante->primerNombre}} {{$estudiante->segundoNombre}} {{$estudiante->primerApellido}}</td>
          <td> {{ $estudiante->codigo}}</td>
          <td> {{ $estudiante->email}}</td>
          <td> {{$estudiante->programaAcademico->NombrePrograma}}</td>
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
@include('admin.usuarios.modals.editarEstudiante',['programas'=> $programas])
@include('admin.usuarios.modals.cargarEstudiante')
@overwrite

@section('scripts')
<!--abrir selectores-->
<script type="text/javascript">
 $(document).ready(function(){
   $('#selectorPrograma1').material_select();
   $('#filtrarPrograma').material_select();
  
  });
</script>
<!-- capturar selector crear -->
<script type="text/javascript">
   $('#selectorPrograma2').change(function() {
     var opcion = $(this).children(":selected").attr("value");
     $('#programaAcademico').val(opcion);
   })
 </script>
<!-- capturar selector editar-->
<script type="text/javascript">
   $('#selectorPrograma2').change(function() {
     var opcion = $(this).children(":selected").attr("value");
     console.log(opcion);
     $('#id_programaAcademico').val(opcion);
   })
</script> 

<script type="text/javascript">
  function abrirCargarArchivo(){
   // $('#crearEstudiante').closeModal();
    $('#cargarEstudiante').openModal();
  }
</script>


<script type="text/javascript">

$('#filtrarPrograma').change(function(){
var ruta = "{{route('admin.estudiantes.index')}}";
var idPrograma = $(this).children(":selected").attr("value");
$('#idPrograma').val(idPrograma);
console.log(idPrograma);
  $.ajax({
      url:ruta,
      type: 'get',
      dataType:'json',
      data:{idPrograma :idPrograma},
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
    $('#selectorPrograma2 option').remove();
    $('#id').val(res[1].id);
    nombre = res[1].primerNombre+" "+res[1].segundoNombre+" "+res[1].primerApellido+" "+res[1].segundoApellido;
    $('p').text(nombre);
    $("#firstname").val(res[1].primerNombre);
    $("#segundoNombre").val(res[1].segundoNombre);
    $("#primerApellido").val(res[1].primerApellido);
    $("#segundoApellido").val(res[1].segundoApellido);
    $("#email").val(res[1].email);
    $("#codigo2").val(res[1].codigo);
    
    $('.selectorPrograma2').append('<option disable selected> Seleccione un programa</option>');
    for (var i =0; i < res[0].length; i++) {
    $('.selectorPrograma2').append('<option value='+res[0][i].Id+'>'+res[0][i].NombrePrograma +'</option>');
     }

    $('#editarEstudiante').openModal();
     $('#selectorPrograma2').material_select();
   });
    
  }

</script> 


@endsection




 