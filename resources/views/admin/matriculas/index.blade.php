@extends('layouts.app')
@section('title','Mis Asignaturas')

@section('content')

    <h4 class="center">Mis Asignaturas</h4>
<br>
    <div class="row">
        <div class="col s12 m12 l12">
        <fieldset class="grey lighten-4">
            <div class="row">
                
                <div class="input-field col s12 l3 m3">                
				    <select name="periodos" id="periodos">
				                        
				        @foreach($periodos as $periodo);
    				        <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano."-".$periodo->Periodo}}</option>
				        @endforeach
				    </select>
                    <label>Periodo Académico</label>
                </div>

            </div>
        </fieldset> 
<br>
<div class="divider grey darken-1"></div>
<br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <table class="responsive-table  bordered" id="asignaturas">
                     
                    </table>
                </div>	
            </div>
        </div>
    </div>
@include('admin.asignaturas.modales.matricular')
@endsection


@section('scripts')

<script type="text/javascript">

	$(document).ready(function(){
	$('#periodos').material_select(); 

	var ruta=  "{{ route('matriculas.index') }}";
	var periodo= $('#periodos').val();

	$('#periodos').change(function(){

		var periodo= $('#periodos').val();

			$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {periodo:periodo},
            		
            		success: function(data) {
                        $('#asignaturas').html(data);
                        $('.tooltipped').tooltip({delay: 50});

                        console.log(periodo);

            		} 
            		
        		});
	});

	

			$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {periodo:periodo},
            		
            		success: function(data) {
                        $('#asignaturas').html(data);
                        $('.tooltipped').tooltip({delay: 50});

                        console.log(periodo);

            		} 
            		
        		});

	});




	
	 function matricular(id){
            

                $('#horario_archivo').val(id);
                $('#horario_estudiante').val(id);           
                $('#matricular').openModal();
            
     }

</script>
@endsection



			     