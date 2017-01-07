@extends('layouts.app')
@section('title','Mis Asignaturas')

@section('content')

    <h4 class="center">Mis Asignaturas</h4>
<br>
    <div class="row">
        <div class="col s12 m12 l12">
        <fieldset class="grey lighten-4">
            <div class="row">
                
                <div class="input-field col s12 m12 l12">
                    <div class="row">
                        <div class="col s12 l3 m3">
                            <select name="periodos" id="periodos">
                                        
                                @foreach($periodos as $periodo)
                            <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano."-".$periodo->Periodo}}</option>
                        @endforeach
                    </select>
                    <label>Periodo Académico</label>
                        </div>

                        <div class="col s1 m1 l1">
                             <i class=" mdi-communication-live-help blue-text" data-tooltip="puedes escoger un periodo para ver las asignaturas que dictaste anteriormente"  data-tooltip-animate-function="slidein" data-tooltip-stickto="right"  data-tooltip-color="#424242" data-tooltip-maxwidth="200"></i>
                        </div>  
                    </div>               
				    
                   
                </div>

            </div>
        </fieldset> 
       @if (session()->has('flash_notification.message'))
                <div id="card-alert" class="card {{ session('flash_notification.level') }}" style="height: 1%">
                    <div class="card-content white-text">
                        <p> @if(session('flash_notification.level')=='success')
                                <i class="mdi-navigation-check"></i>
                            @endif
                            @if(session('flash_notification.level')=='danger')
                                <i class="mdi-alert-error"></i>
                            @endif 
                            @if(session('flash_notification.level')=='warning')
                                <i class="mdi-alert-warning"></i> 
                            @endif
                            @if(session('flash_notification.level')=='info')
                                <i class="mdi-action-info-outline"></i> 
                            @endif
                        {!! session('flash_notification.message') !!}</p>
              
                    </div>
                </div>
            @endif
            <div class="row">
            <div class="col s1 m1 l1 offset-l11 offset-m11 offset-s11">
              
               <i class="mdi-action-info blue-text" data-tooltip="Hola, éstas son las asignaturas que estas dictando éste periodo.
               podras generar un reporte de la asignatura que desees, matricular estudiantes y generar un reporte individual de la asignatura"  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>

            </div>     
        </div>
         
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
       $.unblockUI();
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

        $('#btn-matricular').click(function() { 
        $('#matricular').closeModal(); 
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
                  },message:
                  ' <div class="preloader-wrapper small active"> <div class="spinner-layer spinner-red-only">  <div class="circle-clipper left">  <div class="circle"></div>  </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right">  <div class="circle"></div> </div> </div></div> Matriculando estudiantes, un momento por favor ...'

         }); 
 
        //setTimeout($.unblockUI); 
        });     
    }



</script>
@endsection



			     