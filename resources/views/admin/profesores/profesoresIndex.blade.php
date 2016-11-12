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
					
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
				    	<option value="{{ $PeriodoAcademico->Id}}">{{$PeriodoAcademico->Ano}}-{{ $PeriodoAcademico->Periodo}}</option>
					@endforeach						  			
				</select>	
				<label>Periodo Academico</label>  	
			</div>	

		</div>
	
		<div class="row">		
			<div class="input-field col s6 l3 m3">
				<input id="nombreBusqueda" onkeypress="return buscar();" type="text" placeholder="Nombre del profesor" class="validate">	
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
       
            ruta="{{route('admin.profesoresIndex.index')}}";
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
                            //$('#periodosProfesores').val(value.Id);
                            id=value.Id;
                    
                        });
                        $('#periodosProfesores > option[value="'+id+'"]').attr('selected', 'selected');
                        //$('#periodosProfesores').val(id);
                                            
                    }
                });
            
         
        
    });
//si selecciona un programa academico envia la peticion 
		
			$("#programasProfesores").change(function() {
				
				var programa = $('#programasProfesores').val();
        		var periodo = $('#periodosProfesores').val();
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
                        $('.tooltipped').tooltip({delay: 50});

                        //console.log("entro");

            		} 
            		
        		});

        	   });
                     			
//si selecciona un periodo academico se envia la peticion 
        	$("#periodosProfesores").change(function() {
				
				var programa = $('#programasProfesores').val();
        		var periodo = $('#periodosProfesores').val();
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
            			$('.tooltipped').tooltip({delay: 50});
            		}
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

		function buscar() {
    		var nombreBusqueda = $("input#nombreBusqueda").val();
            var programa = $('#programasProfesores').val();
            var periodo = $('#periodosProfesores').val();
    		ruta = "{{route('admin.profesoresIndex.filterAjax')}}";
        		
	
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
        		
    		} else { 

        		
        		console.log("no hay nada ");
			}
		}

        function ver(id,idprograma){
   
            var ruta="{{route('admin.profesoresIndex.ver',['%idprofesor%','%idprograma%'])}}";
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
   
            /*$.get(ruta,function(res){
                $('p').text(res.Apellidos); 
                $(res).each(function(key,value){

                $("#nombreProfesor").text(value.name+" "+value.Apellidos); 
                        tablaAsignaturas.append("<tr><td>"+value.Codigo+"</td><td>"+value.Nombre+"</td><td>"+value.Creditos+"</td></tr>");
                    
                });
               
                

            });*/
    
        }

	</script>

@endsection

 


         