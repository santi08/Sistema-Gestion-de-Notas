@extends('layouts.app')
@section('title','Informes')

@section('content')
	<h4 class="center">Gestion de Informes</h4>
	<hr>
	<p class="flow-text">Seleccione los items que desea filtrar</p>
	<div class="row">
		<div class="input-field col s5">
							
			<select id='periodos'>
				@foreach($PeriodosAcademicos as $PeriodoAcademico)
					  			
			    <option value="{{ $PeriodoAcademico->Id}}">
			    {{ $PeriodoAcademico->Ano}} - {{ $PeriodoAcademico->Periodo }}
			    </option>

				@endforeach
					  			
			</select>
				  	<label>Periodo Academico</label>
		</div>

		<div class="input-field col s5">
			<select id="programas">
			<option value="" >Seleccione una opción</option>

			@foreach($ProgramasAcademicos as $ProgramaAcademico)
			@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
				<option value="{{$ProgramaAcademico->id}}">		
				
				{{ $ProgramaAcademico->NombrePrograma }}
			</option>
			@endif
			@endforeach
			
			</select>
			<label>Programa Academico</label>
			  			
		</div>

		<div class="col s5 input-field ">
          		<input id="Profesor" type="search" class="validate" >
          	<label for="Profesor">Profesor</label>
        </div>

        <div class="col s5 input-field ">
          		<input id="Asignatura" type="search" class="validate" >
          	<label for="Asignatura">Asignatura</label>
        </div>

        <div class="col s5 input-field ">
          		<input id="Estudiante" type="search" class="validate" >
          	<label for="Estudiante">Estudiante</label>
        </div>

        <div class="input-field col s5">
			<select id='tipoMatricula'>
			<option value="" >Seleccione una opción</option>
			<option value="1">TODOS</option>
			<option value="2">REPITENTES</option>

			
			</select>
			<label>Tipo de matricula</label>
			  			
		</div>

		



	</div>



	<div class="row col s3">
		  <p class="range-field">
      		<input type="range" id="noUi-origin" min="0" max="5" />
      		<label>Rango de notas</label>
    	  </p>
    </div>

		<!-- <div id="slider-start" class="noUi-target noUi-ltr noUi-horizontal">
			<div class="noUi-base">
			|	<div class="noUi-origin" style="left: 13.9024%;">
					<div class="noUi-handle" data-handle="0" style="z-index: 5;">
					
					</div>
				</div>
				<div class="noUi-origin" style="left: 80%;">
					<div class="noUi-handle" data-handle="1" style="z-index: 4;">
			
					</div>
				</div>
			</div>
		</div> -->  

    <div class="row col s12 ">
    	 <a href="#" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">picture_as_pdf</i>
    	 GENERAR REPORTE</a>
    </div>

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
 $('#periodos').material_select();
 $('#programas').material_select();
 $('#tipoMatricula').material_select();
/*
 $('#periodos').change(function(){
 	reporte();
 });

 function reporte(){
 	var periodo= $("#periodos").val();
    var ruta= "";
    alert(ruta);
     
     $.get(ruta);
    /*$.ajax({
    	url:ruta,
    	type:'GET',
    	dataType:'json',
    	data: {periodo:periodo},
    	success:function(res){

    	}

    });

 }*/
});
	
</script>
@endsection
	      
	      



@endsection