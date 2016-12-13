
@extends('layouts.app')
@section('title','Estudiantes')
@section('content')

<h3 class="center">Estudiantes</h3>
 <br>
<!--campo buscar y registrar-->
   <div class="row">
      <div class="col s12 m12 l12">
         <fieldset class="grey lighten-4"> 
            <div class="row">
            
               <div class="col s12 l4 m4">
                  <div class="input-field">
                     <select id="filtrarPrograma">
                        <option id="periodo" value="" disabled selected>Seleccione un Programa</option>
                           @foreach($programas as $programa) 
                              <option id="periodo" value="{{$programa->CodigoPrograma}}" >{{$programa->NombrePrograma}}</option>
                           @endforeach       
                     </select>
                     <label>Periodo Académico</label>
                  </div>
               </div>

               <div class="col s12 m5 l3 offset-l5">
                  <a onClick='openModalCrear()' class=" teal waves-effect waves-green btn modal-trigger" data-target='#crearEstudiante'>Registrar Estudiante</a> 
               </div>    
            </div>
         </fieldset>

         @if (session()->has('flash_notification.message'))
               <div id="card-alert" class="card {{ session('flash_notification.level') }}" style="height: 1%">
                     <div class="card-content white-text">
                        <p>   @if(session('flash_notification.level')=='success')
                              <i class="mdi-navigation-check"></i>
                           @elseif(session('flash_notification.level')=='danger')
                              <i class="mdi-alert-error"></i> 
                           @elseif(session('flash_notification.level')=='warning')
                              <i class="mdi-alert-warning"></i> 
                           @elseif(session('flash_notification.level')=='info')
                              <i class="mdi-action-info-outline"></i> 
                           @endif
                     {!! session('flash_notification.message') !!}</p>
              
                     </div>
               </div>
            @endif
         <br>
         <!--<div class="row">
            <div class="col s12 l12 m12">
               <div class="header-search-wrapper teal darken-1 ">
                  <i class="mdi-action-search"></i>
                     <input id="search" name="search" type="search" onkeyup="buscar();" class="header-search-input z-depth-2" placeholder="Buscar Estudiante">
               </div>
            </div>
         </div>-->

         <input type="hidden" id="idPrograma">

         <div class="divider grey darken-1"></div>
         <br>

         <div class="row" >
            <div class="col s12 m12 l12" id="Estudiantes">

               <table class="responsive-table  bordered">
                  <thead>
                     <tr>
                        <th data-field="name">Código</th>
                        <th data-field="id">Nombre Completo</th>
                        <th data-field="email">Correo</th>
                        <th data-field="programa">Programa</th>
                        <th data-field="accion">Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     
                 
                  </tbody>
               </table>

              
         </div>

      </div>
   </div>
 </div>     
      
@include('admin.usuarios.modals.crearEstudiante',['programas' => $programas])
@include('admin.usuarios.modals.eliminarEstudiante')
@include('admin.usuarios.modals.editarEstudiante',['programas'=> $programas])
@include('admin.usuarios.modals.cargarEstudiante')
@include('admin.usuarios.modals.listarAsignaturas')

@overwrite

@section('scripts')
<script type="text/javascript">
   function listarAsignaturas(id){
      var ruta= "{{route('admin.estudiantes.listarAsignaturas',['%id%'])}}";
      ruta= ruta.replace('%id%',id); 
      console.log(id);
      console.log(ruta);

      $.ajax({
         url:ruta,
         type:'GET',
         dataType:'json',
         data:{id:id},
         success:function(res){
         $('#listarAsignaturas').html(res);
         $('#listarAsignaturas').openModal();
         },
         error:function(error){
            console.log(error);
         }
      });
   }
</script>

<!--abrir selectores-->
<script type="text/javascript"> 
   $(document).ready(function(){
      consulta();
      $("#eliminarEstudiante").addClass("modalEliminar");
      $('#selectorPrograma1').material_select();
      $('#filtrarPrograma').material_select();
         
      });
   </script>

<!-- capturar selector crear -->
<script type="text/javascript">
   $('#selectorPrograma2').change(function() {
      var opcion = $(this).children(":selected").attr("value");
      $('#programaAcademico').val(opcion);
   });
</script>

<!-- capturar selector editar-->
<script type="text/javascript">
   $('#selectorPrograma1').change(function() {
      var opcion = $(this).children(":selected").attr("value");
      $('#id_programaAcademico').val(opcion);
   });
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
         consulta();
      });

      function consulta(){
         var ruta = "{{route('admin.estudiantes.index')}}";
         var idPrograma = $('#filtrarPrograma').val();
         //$('#idPrograma').val(idPrograma);
         //alert(idPrograma);
         $('#data-table-estudiante').DataTable({
                retrieve:true
            }).destroy();
         $.ajax({
            url:ruta,
            type:'GET',
            dataType:'json',
            data:{idPrograma :idPrograma},
            success:function(data){
               $("#Estudiantes").html(data);
               console.log(data);
               $('#data-table-estudiante').DataTable({
            "language":{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        }
                    });
            },
            error:function(xml,error,error2){
               console.log(error);
            }
         });
      } 
   

      
      function eliminar(id){
         var rutaBusqueda="{{route('admin.estudiantes.destroy',['%iduser%'])}}" ;
         rutaBusqueda = rutaBusqueda.replace('%iduser%',id); 
         $.get(rutaBusqueda,function(res){
            var nombre = res.primerNombre+" "+res.segundoNombre+" "+res.primerApellido;
            swal({
               title: "¿Estas seguro de eliminar el Estudiante?",
               text: nombre ,
               type: "warning",
               showCancelButton: true,
               cancelButtonColor:'#388E3C',
               confirmButtonColor: '#E53935',
               confirmButtonText: 'Si, Eliminarlo',
               cancelButtonText: "Cancelar",
               closeOnConfirm: false,
               closeOnCancel: false
            },
            function(isConfirm){
               if (isConfirm){
                  
                  var rutaEliminar="{{route('admin.estudiantes.destroyupdate',['%iduser%'])}}" ;
                  rutaEliminar = rutaEliminar.replace('%iduser%',id);
                  var token = $('#token').val();
                  $.ajax({
                     url:rutaEliminar,
                     headers:{'X-CSRF-TOKEN': token},
                     type: 'PUT',
                     dataType:'json',
                     data:{id},
                     success:function(){
                        window.location= "{{route('admin.estudiantes.index')}}";
                     }
                  });

               }else {
                  swal("Cancelado", "El Estudiante no se ha eliminado", "error");
                  location.reload();
               }
            });
         }); 
      }
    
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
            $("#nombreEditar").text(nombre);
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




 