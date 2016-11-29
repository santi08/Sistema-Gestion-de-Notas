@extends('layouts.app')
@section('title','Profesores')

@section('content')

<h3 class="center">Profesores</h3>
<div class="row">

	<div class="col s12 m12 l12">
		<div class="row">
			<div class="input-field col s5 l4 m4">
				<select name="programas" id="programasProfesores">
					<option value="" disabled selected>Seleccione un programa</option>

						@foreach($ProgramasAcademicos as $ProgramaAcademico)
							@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
								<option value="{{$ProgramaAcademico->Id}}">{{ $ProgramaAcademico->NombrePrograma }}</option>
							@endif
						@endforeach	
				</select>
				<label>Programa Academico</label>	  			
			</div>

			<div class="input-field col s3 l3 m3">					
				<select name="periodos" id="periodosProfesores">
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
				    	<option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
					@endforeach						  			
				</select>	
				<label>Periodo Academico</label>  	
			</div>	

		</div>
	
		<div class="row">		
			<div class="col s8 l3 m3 ">
            <div class="input-field">
               <i class="material-icons prefix">search</i>
               <input id="nombreBusqueda" type="search"   required placeholder="Buscar">           
            </div>
         </div>     
		</div>
<div class="divider  grey darken-1"></div>
<br>
		<div class="row" id="tabla"> 
		
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

 


         