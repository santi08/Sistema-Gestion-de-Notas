
@extends('layouts.app')
@section('title','Estudiantes')
@section('content')
<h3 class="center">Estudiantes</h3>
<!--campo buscar y registrar-->
<!-- finaliza campo buscar y registrar -->
 
<!--campo buscar y registrar-->
 <div class="input-field col s12">
 
    <select id="filtrarPrograma">
      <option id="periodo" value="" disabled selected>Seleccione un Programa 
        </option>
      @foreach($programas as $programa) 
        <option id="periodo" value="{{$programa->CodigoPrograma}}" >{{$programa->NombrePrograma}} 
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

<div class="col s12 m12 l12">
 

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
          <td> {{$estudiante->codigo}}</td>
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

{!! $estudiantes->render()!!}

</div>
</div>



@include('admin.usuarios.modals.eliminarEstudiante')
@include('admin.usuarios.modals.editarEstudiante',['programas'=> $programas])
@include('admin.usuarios.modals.cargarEstudiante')
@overwrite

@section('scripts')

<!--- Paginador -->
<script type="text/javascript">
  $(document).on('click','.pagination a',function(e){
    
    // prevenir evento del paginador y asiganar el id de la pagina 
    e.preventDefault();
    var idPagina = $(this).attr('href').split('page=')[1];
    var ruta = '?page='+idPagina;
    
    // campos de busqueda que han sido inicializados o activados
    var idPrograma=$('#idPrograma').val();
    var valor = $('#search').val();

                        
    $.ajax({
     url:ruta,
     data:{idPagina:idPagina,idPrograma:idPrograma,valor:valor},
     type:'GET',
     dataType:'json',
     success:function(res){
       console.log(res);
       $("#Estudiantes").html(res);
         

     },error:function(xml,error,error2){
        console.log(error);
      }

    });
    
  });

</script>

<!--abrir selectores-->
<script type="text/javascript">
 
 $(document).ready(function(){
   $('#selectorPrograma1').material_select();
   $('#filtrarPrograma').material_select();
   alerta();

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
   $('#selectorPrograma1').change(function() {
     var opcion = $(this).children(":selected").attr("value");
     $('#id_programaAcademico').val(opcion);
   })
</script> 

<script type="text/javascript">
   function abrirCargarArchivo(){
    console.log('si');
   // $('#crearEstudiante').closeModal();
    //window.location= "{{route('admin.estudiantes.index')}}";
    $('#cargarEstudiante').openModal();
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
      type:'GET',
      dataType:'json',
      data:{idPrograma :idPrograma},
      success:function(data){
       $("#Estudiantes").html(data);
       console.log(data);
        
      },error:function(xml,error,error2){
        console.log(error);
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
 var idPrograma=$('#idPrograma').val();
 
  $.ajax({
      url:ruta,
      type: 'GET',
      dataType:'json',
      data:{valor:valor,idPrograma:idPrograma},
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
    $('#editarEstudiante').openModal();
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
    
    $('#selectorPrograma2').append('<option disable selected> Seleccione un programa</option>');
    for (var i =0; i < res[0].length; i++) {
    $('#selectorPrograma2').append('<option value='+res[0][i].CodigoPrograma+'>'+res[0][i].NombrePrograma +'</option>');
     }

    
    $('#selectorPrograma2').material_select();
   });
    
  }

</script> 

<!-- Bloquear pantalla -->
<script type="text/javascript">
$(document).ready(function(){
  var option= { 
        target:'#output2',
        dataType:  'json', 
        beforeSubmit:showRequest,   // target element(s) to be updated with server response 
        success:showResponse // post-submit callback 
    };
    $('#formularioSubir').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(option); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
    
  });
function showRequest(formData, jqForm, options) { 
    var queryString = $.param(formData); 
    jsShowWindowLoad();
    console.log('About to submit: \n\n' + queryString); 
    return true; 
    }   

function showResponse(data)  { 
      jsRemoveWindowLoad();
      console.log(data);
      window.location="{{route('admin.estudiantes.index')}}";
} 

function jsRemoveWindowLoad() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();
}
 
function jsShowWindowLoad(mensaje) {
  
    console.log('si');
   $('#crearEstudiante').closeModal();
    //eliminamos si existe un div ya bloqueando
    jsRemoveWindowLoad();


    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";
 
    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
 
    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
 
    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
 
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#000;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div><img src={{asset('img/load.gif')}}></div>";
 
        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);
 
        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"
 
        //asignamos el div que bloquea
        $("#WindowLoad").append(input);
 
        //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();
 
        //centramos el div del texto
        $("#WindowLoad").html(imgCentro);
       
}
</script>

<!-- funcion enviar archivo .txt por ajax -->
<script type="text/javascript">
  
</script>

<style>
#WindowLoad
{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    filter:alpha(opacity=65);
   -moz-opacity:65;
    opacity:0.65;
    background:#999;
}
</style>
@endsection




 