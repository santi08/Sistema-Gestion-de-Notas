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
       @if (session()->has('flash_notification.message'))
                <div id="card-alert" class="card {{ session('flash_notification.level') }}" style="height: 1%">
                    <div class="card-content white-text">
                        <p> @if(session('flash_notification.level')=='success')
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
            
                 /*$('#codigo').autocomplete({
                  source: "{/{url('matricular/autocomplete')}}",
                  minLength: 2,
                  select: function(event, ui) {
                    $('#codigo').val(ui.item.value);
                  }
                });*/

        $('#matricular').openModal();       
    }

</script>
@endsection



			     