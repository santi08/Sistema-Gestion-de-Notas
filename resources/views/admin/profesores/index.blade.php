@extends('layouts.app')
@section('title','Profesores')

@section('content')
<div class="row">
	<h3 class="center">Profesores</h3>
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
					<!--<option value="" disabled selected>Seleccione un programa</option>-->
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
				    	<option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
					@endforeach						  			
				</select>	
				<label>Periodo Academico</label>  	
			</div>	

		</div>
	
		<div class="row">		
			<div class="input-field col s6 l3 m3">
              <input id="nombreBusqueda" type="search" onkeyup="buscar()" required>
              <label for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
			<!--	<input id="nombreBusqueda" onkeypress="return buscar();" type="text" placeholder="Nombre del profesor" class="validate">-->	
        	</div>    
		</div>
<div class="divider  grey darken-1"></div>
		<div class="row" id="tabla"> 
		
			<table class="striped">
				<thead>
					<tr>
						<th>Apellidos</th>
					<th>Nombre</th>
					<th>Programa</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
					@foreach($profesores as $profesor)
						<tr>
							<td>{{$profesor->Apellidos}}</td>
							<td>{{$profesor->Nombre}}</td>
							<td>{{$profesor->NombrePrograma}}</td>
							<td>
								<a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

								<a onclick="ver({{$profesor->Id}},{{$profesor->idprograma}})" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Ver" data-target="#ver"><i class="material-icons">visibility</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>					
			<div class="paginate">
				{{ $profesores->render()}}
			</div>
		</div>
	</div>
</div>

@include('admin.profesores.modales.ver')
@endsection 

@section('scripts')


<script type="text/javascript">
    $(document).ready(function(){
       $('#programasProfesores').material_select();  
       $('#periodosProfesores').material_select(); 

     /* ruta="{{route('admin.profesores.index')}}";

        var periodo = $('#periodosProfesores').val();
        var id;
       $.ajax({
            url:ruta,
            type:"GET",
            data:{periodo:periodo},
            dataType:'json',
            success:function(data){
                console.log(data);
                $(data).each(function(key,value){
                    id=value.Id;    
                });
                //$('#periodosProfesores > option[value="'+id+'"]').attr('selected', 'selected');
                $('select#periodosProfesores').val(id);                                
            }
        });*/        
    });
//si selecciona un programa academico envia la peticion 	
    $("#programasProfesores").change(function() {		     
		consultarProgramasPeriodos();
    });
                     			
//si selecciona un periodo academico se envia la peticion 
    $("#periodosProfesores").change(function() {
		consultarProgramasPeriodos();
    });
    
//paginacion sin recargar la pagina
	$(document).ready(function(){
		$(document).on('click','.pagination a',function(e){
        	e.preventDefault();
        	var page= $(this).attr('href').split('page=')[1];
        	var ruta="{{route('admin.profesores.index')}}"
            console.log(page);
        	$.ajax({
        		url:ruta,
        		type:"GET",
        		data:{page:page},
        		dataType:'json',
        		success:function(data){
        			console.log(data);        				
        		}
        	});		
        });
    });

	function buscar() {
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
	}

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

    function consultarProgramasPeriodos(){
        var programa = $('#programasProfesores').val();
        var periodo = $('#periodosProfesores').val();
        var nombreBusqueda = $('#nombreBusqueda').val();
        ruta = "{{route('admin.profesores.filterAjax')}}";    
        $.ajax({
            type: "GET",
            url: ruta,
            data: {programa:programa,periodo:periodo,nombreBusqueda:nombreBusqueda},      
            success: function(data) {   
                $("#tabla").html(data); 
                $('.tooltipped').tooltip({delay: 50});
            }
        });
    }
</script>

@endsection

 


         