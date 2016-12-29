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

			<div class="input-field col s9 l4 m4 fuentes" >
                    @if (Auth::guard('admin')->user()->rolAdministrador())
                        <select id="programas" name="programas">
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

		</div>

        <div class="row">
	        @if(Auth('admin')->user()->rolDocente())
	        	<div class="col s12 m12 l12">
	        		<a onClick="generarPdf(1)" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">picture_as_pdf</i>
	    	 		GENERAR REPORTE</a>
        		</div>
        	@else	
        		<div class="col s12 m12 l12">
	        		<a  onClick="generarPdf(2)" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">picture_as_pdf</i>
	    	 		GENERAR REPORTE</a>
        		</div>
        	@endif
    	</div>
    	<br>
    	</div>
	</div>
    
@overwrite

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
 $('#periodos').material_select();
 $('#programas').material_select();

});


function generarPdf(id){
 	var periodo= $("#periodos").val();
 	var programa= $("#programas").val();
 	if(id == 1){
 		var ruta= "{{route('docente.informes.pdfGeneral',['periodo','programa'])}}";
 	}else{
 		var ruta= "{{route('admin.informes.pdfGeneral',['periodo','programa'])}}";
 	}
 	ruta=ruta.replace('periodo',periodo);
 	ruta=ruta.replace('programa',programa);

 	window.open(ruta);
 }
	
</script>
@overwrite
	     