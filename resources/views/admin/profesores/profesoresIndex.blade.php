@extends('layouts.app')
@section('title','Profesores')

@section('content')
<div class="row">
	<h4 class="center">Profesores</h4>
	<div class="col s12 m12 l12">
		<div class="row">

			<div class="input-fiel col s6">
				<label>Programa Academico</label>
				<select name="programas" id="programas">

						@foreach($ProgramasAcademicos as $ProgramaAcademico)
							@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
								<option value="{{$ProgramaAcademico->Id}}">{{ $ProgramaAcademico->NombrePrograma }}</option>
							@endif
						@endforeach	
				</select>	  			
			</div>

			<div class="input-fiel col s6">
				<label>Periodo Academico</label>		
				<select name="periodos" id="periodos">
					
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
				    	<option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
					@endforeach						  			
				</select>	  	
			</div>	

		</div>

		<div class="row">
			<div class="col s4 m3 l4">
				<div class="row">
					<div class="col s12 m12 l12 input-field ">
        					<i class="material-icons prefix">search</i>
          					<input id="nombreBusqueda" type="search" class="validate" >
          					<label for="icon_prefix">Buscar</label>
        			</div>
        		</div>
			</div>
		</div>

<hr>
	

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

								<a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
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

@endsection

@section('scripts')

	<script type="text/javascript">
//si selecciona un programa academico envia la peticion 
		$(document).ready(function(){
			$("#programas").change(function() {
				
				var programa = $('#programas').val();
        		var periodo = $('#periodos').val();
        		var nombreBusqueda = $('#nombreBusqueda').val();
        		ruta = "{{route('admin.profesoresIndex.filterAjax')}}";
        		
        		console.log(ruta);
                console.log(programa);
                console.log(periodo);
                console.log(nombreBusqueda);
               
        		
        		$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {programa:programa,periodo:periodo,nombreBusqueda:nombreBusqueda},
            		
            		success: function(data) {
                        $("#tabla").html(data);

                        //console.log("entro");

            		} 
            		
        		});

        	   });
                     			
//si selecciona un periodo academico se envia la peticion 
        	$("#periodos").change(function() {
				
				var programa = $('#programas').val();
        		var periodo = $('#periodos').val();
        		var nombreBusqueda = $('#nombreBusqueda').val();
        		ruta = "{{route('admin.profesoresIndex.filterAjax')}}";
        		
        		console.log(ruta);
                console.log(programa);
                console.log(periodo);
                console.log(nombreBusqueda);
        		
        		$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {programa:programa,periodo:periodo,nombreBusqueda:nombreBusqueda},
            		
            		success: function(data) {	
            			$("#tabla").html(data);	
            		}
        		});
        	});
    	});
//paginacion sin recargar la pagina
		$(document).ready(function(){

			$(document).on('click','.pagination a',function(e){
        		e.preventDefault();
        		var page= $(this).attr('href').split('page=')[1];

        		ruta="{{route('admin.profesoresIndex.index')}}"
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


	</script>

@endsection

 


         