@extends('layouts.app')
@section('title','Profesores')

@section('content')

<h3 class="center">Profesores</h3>
<br>
<div class="row">
	<div class="col s12 m12 l12">

        <fieldset class="grey lighten-4">
              <div class="row">

      <div class="input-field col s5 l4 m4">

        @if ( Auth::guard('admin')->user()->rolAdministrador())
          <select name="programas" id="programasProfesores">
            <option value="" disabled selected>Seleccione un programa</option>
              @foreach($ProgramasAcademicos as $ProgramaAcademico)
                @if($ProgramaAcademico->NombrePrograma != 'GENERICO')
                      <option value="{{$ProgramaAcademico->Id}}">{{ $ProgramaAcademico->NombrePrograma }}</option>
                @endif
              @endforeach 
          </select>
              <label>Programa Academico</label> 
        @elseif (Auth::guard('admin')->user()->rolCoordinador())
            <select name="programas" id="programasProfesores">
              @foreach(Auth::guard('admin')->user()->usuarios[0]->programasAcademicos as $ProgramaAcademico)
                @if($ProgramaAcademico->NombrePrograma != 'GENERICO')
                      <option value="{{$ProgramaAcademico->Id}}">{{ $ProgramaAcademico->NombrePrograma }}</option>
                @endif
              @endforeach 
             </select>
              <label>Programa Academico</label> 
        @endif
                
      </div>

      <div class="input-field col s3 l3 m3">
            
        <select name="periodos" id="periodosProfesores">
          <!--<option value="" disabled selected>Seleccione un programa</option>-->
          @foreach($PeriodosAcademicos as $PeriodoAcademico)
              <option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
          @endforeach                   
        </select> 
        <label>Periodo Academico</label>    
      </div>  

    </div>
        </fieldset>
<br>
	
		<div class="row">		
            <div class="col s12 l12 m12 ">
                <div class="header-search-wrapper teal darken-1 ">
                    <i class="mdi-action-search"></i>
                    <input id="nombreBusqueda" type="search" onkeyup="buscar();" class="header-search-input z-depth-2" placeholder="Buscar Profesor">
                </div>
            </div>  
		</div>

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
$(document).ready(function(){
   
   $("#ver").addClass("modalDetalleProfesor");
      consulta(); 
   $('#programasProfesores').material_select();  
   $('#periodosProfesores').material_select();

   $("#periodosProfesores").change(function() {
        consulta();
   });
   
   $("#programasProfesores").change(function() {           
       consulta();
   });
   
   $("#nombreBusqueda").keyup(function(){
      consulta();
   });
     
//paginacion ajax
    function consulta(){
     var periodo = $('#periodosProfesores').val();
     var programa=$('#programasProfesores').val();
     var nombreBusqueda = $("#nombreBusqueda").val();
     console.log(periodo);
     console.log(programa);
     console.log(nombreBusqueda);
     
     var ruta="{{route('admin.profesores.index')}}";

     $.ajax({
        url:ruta,
        type:"GET",
        data:{periodo:periodo,programa:programa,nombreBusqueda:nombreBusqueda},
        dataType:'json',
        success:function(data){
        console.log(data);    
        $('#tabla').html(data);                     
         }
      }); 

     $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var idPagina= $(this).attr('href').split('page=')[1];
            var periodo = $('#periodosProfesores').val();
            var programa =$('#programasProfesores').val();
            var ruta = '?page='+idPagina;
            
            $.ajax({
                url:ruta,
                type:"GET",
                data:{periodo:periodo,programa:programa},
                dataType:'json',
                success:function(data){
                    console.log(data);
                    $('#tabla').html(data);                     
                }
            });     
        }); 
     };
});

	/*function buscar() {
    	var nombreBusqueda = $("input#nombreBusqueda").val();
        var programa = $('#programasProfesores').val();
        var periodo = $('#periodosProfesores').val();
    	var ruta = "{{route('admin.profesores.filterAjax')}}";		
    	if (nombreBusqueda != "") {
    		$.ajax({
            	type: "GET",
            	url: ruta,
            	data: {programa:programa,periodo:periodo,nombreBusqueda:nombreBusqueda},	
            	success: function(data) {	
            		$("#tabla").html(data);	
            		$('.tooltipped').tooltip({delay: 50});
            	}
        	});
        		
    	}else { 		
        	console.log("no hay nada ");
		}
	}*/

    function ver(id,idprograma){
        var ruta="{{route('admin.profesores.ver',['%idprofesor%','%idprograma%'])}}";
        var tablaAsignaturas = $("#tablaAsignaturas");
        var programa = $('#programasProfesores').val();
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

 


         