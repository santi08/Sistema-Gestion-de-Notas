@extends('layouts.app')
@section('title','Informes')

@section('content')
	<h4 class="center">Gestion de Informes</h4>
	<br>        
<div class="divider  grey darken-1"></div>
<br>  
	<p class="flow-text">Seleccione los items que desea filtrar</p>
	<div class="row">
		<div class="col s12 m12 l12">
			
		<div class="row">
			<div class="col s5 l5 m5">
				
				<div class="input-field">
					<select id='periodos'>
						@foreach($PeriodosAcademicos as $PeriodoAcademico)
					  			
			    			<option value="{{ $PeriodoAcademico->Id}}">
			    				{{ $PeriodoAcademico->Ano}} - {{ $PeriodoAcademico->Periodo }}
			    			</option>

						@endforeach
					  			
					</select>
				  	<label>Periodo Academico</label>
				</div>			
			</div>

			<div class="col s5 m5 l5">
				
					<div class="input-field" >
						<select id="programas">
							<option value="" >Seleccione una opción</option>

							@foreach($ProgramasAcademicos as $ProgramaAcademico)
								@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
								<option value="{{$ProgramaAcademico->id}}">{{ $ProgramaAcademico->NombrePrograma }}
								</option>
								@endif
							@endforeach
			
						</select>
						<label>Programa Academico</label>
			  			
					</div>
				
			</div>
		</div>

        <div class="row">
        	<div class="col s12 m12 l12">
        		<a href="#" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">picture_as_pdf</i>
    	 		GENERAR REPORTE</a>

        	</div>
    	</div>
    	<br>
    	</div>
	</div>
    

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
 $('#periodos').material_select();
 $('#programas').material_select();
 $('#tipoMatricula').material_select();

 $('#periodos').change(function(){
 	reporte();
 });

 function reporte(){
 	var periodo= $("#periodos").val();
    var ruta= "";
    alert(ruta);
     

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