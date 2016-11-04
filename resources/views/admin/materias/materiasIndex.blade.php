@extends('layouts.app')
@section('title','Asignaturas')

@section('content')
	<h4 class="center">Asignaturas</h4>
    <div class="row">

        <div class="col s12 m12 l12">
            
            <div class="row">

            

            {!!Form::model(Request::all(),['route'=>'admin.materiasIndex.index','method'=>'GET'])!!}
                <div class="input-field col s5 l5 m4 fuentes" >
                    
                    <select id="programas" name="programas">
                        @foreach($programas as $programa);
                            @if($programa->NombrePrograma != 'GENERICO')
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            @endif
                        @endforeach

                    </select>
                    <label>Programa academico</label>
                    
                </div>

                <div class="input-field col s3 l3 m3">
                    
                    <select name="periodos" id="periodos">
                        @foreach($periodos as $periodo);
                            <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
                        @endforeach
                    </select>

                    <label>Periodo Academico</label>
                    
                </div>

                {!!Form::close()!!}
                
                
            </div>
<br>
<hr>
            <div class="row">
                <div id="tabla" class="col l12">
                    <table class="responsive-table striped bordered" id="asignaturas">
                        <thead >
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Creditos</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </thead>

                        <tbody>

                            @foreach ($asignaturas as $asignatura)
                        <tr>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                            <td>{{ $asignatura->Grupo}}</td>
                            <td>  <a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

                              <a href="#" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons">assignment_ind</i></a>

                               <a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Estudiantes"><i class="material-icons">visibility</i></a>

                            </td>                    
                        </tr>
                        @endforeach
                    
                        </tbody>
                    </table>

                    <div>
                        {{ $asignaturas->render() }}
                    </div>

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
        		ruta = "{{route('admin.materiasIndex.filterAjax')}}";
        		
        		console.log(ruta);
                console.log(programa);
                console.log(periodo);
        		
        		$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {programa:programa,periodo:periodo},
            		
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
        		ruta = "{{route('admin.materiasIndex.filterAjax')}}";
        		
        		console.log(ruta);
                console.log(programa);
                console.log(periodo)
        		
        		$.ajax({
            		type: "GET",
            		url: ruta,
            		data: {programa:programa,periodo:periodo},
            		
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

        		ruta="{{route('admin.materiasIndex.index')}}"
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
