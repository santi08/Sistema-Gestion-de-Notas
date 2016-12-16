@extends('layouts.app')
@section('title','Profesores')

@section('content')

<h3 class="center">Profesores</h3>
<br>
<div class="row">

<div class="col s12 m12 l12 dataTables_wrapper" id="data-table-simple_wrapper">

        <fieldset class="grey lighten-4">

            <div class="row">
                <div class="input-field col s8 l4 m4 " >
                    @if (Auth::guard('admin')->user()->rolAdministrador())
                        <select id="programas" name="programas">
                            <option value="" disabled selected>Seleccione un programa</option>
                            @foreach($programas as $programa);
                                @if($programa->NombrePrograma != 'GENERICO')
                                    <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                                @endif
                            @endforeach
                        </select>
                            <label>Programa Académico</label>
                    @elseif (Auth::guard('admin')->user()->rolCoordinador())
                        <select id="programas" name="programas">
                            @foreach(Auth::guard('admin')->user()->usuarios[0]->programasAcademicos as $programa);
                           
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            
                            @endforeach

                        </select> 
                        <label>Programa Académico</label>                   
                    @endif            
                </div>

                <div class="input-field col s3 l3 m3">					
				    <select name="periodos" id="periodosProfesores">
                        @foreach($PeriodosAcademicos as $PeriodoAcademico)
				    	   <option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
                        @endforeach						  			
				    </select>	
				    <label>Periodo Academico</label>  	
                </div>
                @if(Auth::guard('admin')->user()->rolCoordinador())
                    <div class="col s1 m1 l1">
                             <i class=" mdi-communication-live-help blue-text" data-tooltip="puedes escoger el periodo que desees filtrar, si coordinas más programas puedes tambien filtrar por el programa académico"  data-tooltip-animate-function="slidein" data-tooltip-stickto="right"  data-tooltip-color="#424242" data-tooltip-maxwidth="200"></i>
                </div>      
                @elseif(Auth::guard('admin')->user()->rolAdministrador())

                    <div class="col s1 m1 l1">
                             <i class=" mdi-communication-live-help blue-text" data-tooltip="puedes escoger el periodo que desees filtrar, tambien puedes filtrar por el programa académico"  data-tooltip-animate-function="slidein" data-tooltip-stickto="right"  data-tooltip-color="#424242" data-tooltip-maxwidth="200"></i>
                    </div> 
                @endif
            </div>

        </fieldset>
        <div class="row">
            <dir class="col s1 m1 l1 offset-l11 offset-m11 offset-s11">
              
               <i class="mdi-action-info blue-text" data-tooltip="Hola, en esta sección podras consultar información de los  distintos profesores de la sede, ademas puedes generar un reporte individual de ellos."  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>

            </dir>     
        </div>
	
		<!--<div class="row">		
            <div class="col s12 l12 m12 ">
                <div class="header-search-wrapper teal">
                    <i class="mdi-action-search"></i>
                    <input id="nombreBusqueda" type="search" onkeyup="buscar();" class="header-search-input z-depth-2" placeholder="Buscar Profesor">
                </div>
            </div>  
		</div>-->

        <br>            
            <div class="divider  grey darken-1"></div>
        <br>

		<div class="row" >
            <div class="col s12 m12 l12 " id="tabla">
                
            </div> 
		</div>

	</div>
</div>

@include('admin.profesores.modales.ver')
@endsection 

@section('scripts')

<script type="text/javascript">
   
    function generarPdf(idProfesor,idPrograma){ 
        var periodo = $('#periodosProfesores').val();
        var url="{{route('admin.informes.pdfProfesor',['profesor','periodo','programa'])}}";
        url=url.replace('profesor',idProfesor);
        url=url.replace('periodo',periodo);
        url=url.replace('programa',idPrograma);

        window.open(url);    
          
  }

$(document).ready(function(){
    consulta(); 
    $('#programas').material_select();  
    $('#periodosProfesores').material_select();
    $("#ver").addClass("modalDetalleProfesor");
    $("#periodosProfesores").change(function() {
        consulta();
    });
   
    $("#programas").change(function() {           
       consulta();
    });
   
   /*$("#nombreBusqueda").keyup(function(){
      consulta();
   });*/
     
//paginacion ajax
    function consulta(){
     var periodo = $('#periodosProfesores').val();
     var programa=$('#programas').val();
     var ruta="{{route('admin.profesores.index')}}";

     $('#data-table').DataTable({
                retrieve:true
            }).destroy();

     $.ajax({
        url:ruta,
        type:"GET",
        data:{periodo:periodo,programa:programa},
        dataType:'json',
        success:function(data){    
        $('#tabla').html(data);
        $('#data-table').DataTable({
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
        $('.tooltipped').tooltip({delay: 50});                    
         }
      }); 

     
     };
});

 function ver(id,idprograma){
        var ruta="{{route('admin.profesores.ver',['%idprofesor%','%idprograma%'])}}";
        var tablaAsignaturas = $("#tablaAsignaturas");
        var programa = $('#programas').val();
        var periodo = $('#periodosProfesores').val();   
        $("#tablaAsignaturas td").remove();      
        ruta = ruta.replace('%idprofesor%',id);
        ruta = ruta.replace('%idprograma%',idprograma);
        $.ajax({
            url:ruta,
            type:"GET",
            data: {programa:programa,periodo:periodo},
            dataType:'json',
            success:function(data){
                $(data).each(function(key,value){
                    $("#nombreProfesor").text(value.name+" "+value.Apellidos); 
                    tablaAsignaturas.append("<tr><td>"+value.Codigo+"</td><td>"+value.Nombre+"</td><td>"+value.Creditos+"</td></tr>");    
                });
                $('#ver').openModal();                                  
            }
        });        
    }
</script>

@endsection

 


         