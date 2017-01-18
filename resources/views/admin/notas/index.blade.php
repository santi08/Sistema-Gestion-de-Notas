@extends('layouts.appNota')
@section('title','Notas')
@section('content')
<br>
<div class="row">
	<div class="col s12 m12 l12">

				<div class="row">
					<div class="col s12 m12 l12">
						<div id="breadcrumbs-wrapper">
          					<div class="container">
            					<div class="row">
              						<div class="col s12 m12 l12">
	                					<ol class="breadcrumbs">
                    						<li><a href="{{url('/index')}}">Inicio</a></li>
                    						<li><a href="{{route('matriculas.index')}}">Mis asignaturas</a></li>
                    						<li class="active">Notas</li>
                						</ol>
              						</div>
            					</div>
          					</div>
        				</div>
					</div>
				</div>
				<br>
			<fieldset class=" grey lighten-4">
				<div class="row">
					<div class="col s12 m7 l6">
						<h5>Asignatura: {{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</h5>
					</div>
					<div class="col s12 m6 l4">
						<h5>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}}</h5> 
					</div>
					<div class="col s12 m4 l2">
						<h5>Grupo: {{$asignatura->Grupo}}</h5>
					</div>
				</div>
				<div class="row">
						<div class=" col s6 m6 l3">
							<h6>Disponible: {{$porcentajeDisponible}}%</h6>
						</div>
						<div class=" col s6 m6 l3">
							<h6>Asignado: {{100 - $porcentajeDisponible}}%</h6>
						</div>
				</div>
				
			</fieldset>
			@if (session()->has('flash_notification.message'))
            	<div id="card-alert" class="card {{ session('flash_notification.level') }}" >
                  	<div class="card-content white-text" style="height: 2%""> 
                        <p>	@if(session('flash_notification.level')=='success')
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

@if($porcentajeDisponible > 0)
		<div class="row">
			 <div class="col s9 m4 l4">
					<button data-target="insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn waves-light waves-effect  teal lighten-2"><i class="mdi-content-add-circle left modal-trigger" ></i> Insertar Item</button>
			</div>

			 <div class="col s1 m1 l1 offset-l6 " >
              
               <i style="padding-left: 70px" class="mdi-communication-live-help blue-text" data-tooltip="Hola, puedes ingresar la nota dando click en la celda, digitar la nota y presionar la tecla Enter"  data-tooltip-animate-function="slidein" data-tooltip-stickto="top"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>

            </div>

            <div class="col s1 m1 l1 " >
              
               <i class="mdi-action-info blue-text" data-tooltip="Hola, estas en la sección de registro de notas, puedes agregar items de evaluacion y a los items puedes agregarles subitems, puedes editarlos si lo deseas"  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>

            </div>
		</div>
		<br>
@endif

<div class="divider grey darken-1"></div>
			
<div id="Notas" class="section">
<div class="floatThead-container">
	<table id="mainTable"  style="cursor: pointer;">

		<thead style="background: rgb(236, 239, 241);" >
						<th style="border: 1px solid black;" class="floatThead-col" rowspan="2">Codigo</th>
						<th style="border: 1px solid black;" class="floatThead-col" rowspan="2">Nombre Completo</th>
						<th style="border: 1px solid black;" class="floatThead-col" rowspan="2">T. Mat.</th>
						<th style="border: 1px solid black;" class="floatThead-col" rowspan="2">DEF</th>
						@if (count($estudiantes[0]->items)>0)
							@foreach ($estudiantes[0]->items as $item)
								@if (count($item->subitems)>0)

									<th class="floatThead-col center" style="border: 1px solid black;" colspan="{{count($item->subitems)}}">{{$item->nombre}} ({{$item->porcentaje}} %)
									@if ($item->tipoitem->nombre != "PARCIALES")
										<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="btn-flat modal-trigger   " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem " ><i class="mdi-content-add green-text" ></i></a>
									@endif
										<a data-target="EditarItem"
										onclick="editar_item({{$item->id}},'{{$item->nombre}}',{{$item->porcentaje}},'{{$item->descripcion}}',{{$item->tipo_id}})" 
										class="btn-flat  " data-position="bottom" data-delay="50" data-tooltip="Editar Item " ><i class="mdi-editor-mode-edit yellow-text text-darken-4" ></i></a>
										<a onclick="eliminar({{$item->id}});" id="{{$item->id}}" 
										class=" btn-warning-cancel btn-flat " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="mdi-action-delete red-text text-darken-4"></i></a>
									</th>
								@else
									<th class="floatThead-col center" style="border: 1px solid black;" rowspan="2"  >{{$item->nombre}} ({{$item->porcentaje}} %)
										<a data-target="insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class=" btn-flat  " data-position="top"  data-tooltip="Insertar subitem"><i class="mdi-content-add green-text" ></i></a>
											<a data-target="EditarItem"
										onclick="editar_item({{$item->id}},'{{$item->nombre}}',{{$item->porcentaje}},'{{$item->descripcion}}',{{$item->tipo_id}})" 
										class="btn-flat  " data-position="bottom" data-delay="50" data-tooltip="Editar Item " ><i class="mdi-editor-mode-edit yellow-text text-darken-4" ></i></a>

										<a onclick="eliminar({{$item->id}});" class="btn-flat  btn-warning-cancel" data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="mdi-action-delete red-text text-darken-4"></i></a>
									</th>
								@endif
							@endforeach
						@endif
							<tr style="border: 1px solid black;">
							@foreach ($estudiantes[0]->items as $item)			
								@if (count($item->subitems)>0)			
									@foreach ($item->subitems as $subitem)
										<th  class="floatThead-col center" style="border: 1px solid black;">{{$subitem->nombre}}
										@if ($subitem->item->tipoitem->nombre != "PARCIALES")
											({{$subitem->porcentaje}}%) 

											<a data-target="EditarSubitem"
											onclick="editar_subitem({{$subitem->id}},'{{$subitem->nombre}}',{{$subitem->porcentaje}},'{{$subitem->descripcion}}')" 
											class="btn-flat  " data-position="bottom" data-delay="50" data-tooltip="Editar Subitem " ><i class="mdi-editor-mode-edit yellow-text text-darken-4" > </i></a>

											<a  onclick="eliminarSubitem({{$subitem->id}});" class="btn-flat" data-position="bottom" data-delay="50" data-tooltip="Eliminar subitem"><i class="mdi-action-delete red-text text-darken-4"></i></a>
										@endif
											
										</th>
									@endforeach
								@endif	
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($estudiantes as $estudiante)
							<tr style="border: 1px solid black;">
								<th  style="border: 1px solid black;">{{$estudiante->estudiante->codigo}}</th>
								<th  style="border: 1px solid black;">{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</th>
								<th style="border: 1px solid black;">
									{{$estudiante->tipoMatricula}}
								</th>
								<th  id="matricula-{{$estudiante->id}}" style="border: 1px solid black;">{{$estudiante->definitiva}}</th>
								@if (count($estudiante->items)>0)
									@foreach ($estudiante->items as $item)
										@if (count($item->subitems)>0)
											@foreach ($estudiante->subitems as $subitem)

												@if($item->id == $subitem->item_id)
													<td id="subitem-{{$subitem->pivot->id}}" onchange="insertarNotaSubitem({{$subitem->pivot->id}},{{$subitem->pivot->matricula_id}},{{$subitem->pivot->subitem_id}})" 
															style="border: 1px solid black;"
													>{{$subitem->pivot->nota}}</td>
												@endif
											@endforeach										
										@else
											<td tabindex="1" id="item-{{$item->pivot->id}}"  
											style="border: 1px solid black;"
											onchange="insertarNotaItem({{$item->pivot->id}},{{$item->pivot->matricula_id}},{{$item->pivot->item_id}})">{{$item->pivot->nota}}</td>
										@endif
									@endforeach
								@endif
							</tr>
						@endforeach
					</tbody>

		</table>
		</div>
	</div>
</div>
</div>




	@include('admin.notas.modales.subitems')
	@include('admin.notas.modales.items')
	@include('admin.notas.modales.items-editar')
	@include('admin.notas.modales.subitems-editar')
	
@endsection 

@section('scripts')
	
	<script type="text/javascript">
		$('#mainTable').editableTableWidget().find('td:first').focus();
		
	 	$(document).ready(function(){ 
	 		$.unblockUI();
			$("#insertarItem").addClass("modalInsertarItem");
		 	$("#insertarSubitem").addClass("modalInsertarSubItem");
		 	$("#EditarSubitem").addClass("modalInsertarSubItem");
		 	$("#EditarItem").addClass("modalInsertarSubItem");
		});		

	 	$(document).ready(function(){ 
	 		
     	var m= $('mainTable #td').text();
	 	console.log(m);
	 	});
		
	function insertar_item(id){
		
	    $('#insertarItem').openModal();
	    $('#horario').val(id);
	    $('#tipo_item').material_select();
	}

	function loading(modal){
		 $('#'+modal).closeModal(); 
	        $.blockUI({ css: { 
	            border: 'none', 
	            padding: '15px', 
	            backgroundColor: '#000', 
	            '-webkit-border-radius': '10px', 
	            '-moz-border-radius': '10px', 
	            opacity: .5, 
	            color: '#fff' 
	                  },message:
	                  ' <div class="preloader-wrapper small active"> <div class="spinner-layer spinner-red-only">  <div class="circle-clipper left">  <div class="circle"></div>  </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right">  <div class="circle"></div> </div> </div></div> Cargando ...'

	         });
	}

	function insertar_subitem(id,nombre){
	    $('#insertarSubitem').openModal();
	    $('#id_item').val(id);
	    $('#nombreItem').html(nombre);
	}

	function insertar_subitem_parcial(id,nombre){
	    $('#insertarSubitemParcial').openModal();
	    $('#id_item_parcial').val(id);
	    $('#nombreItemParcial').html(nombre);
	}

	function editar_item(id,nombre,porcentaje,descripcion,tipo_item){

				$('#EditarItem').openModal();
				$('#EditarItem #id_item').val(id);
				$('#EditarItem #nombre_item').val(nombre);
        		$('#EditarItem #porcentaje').val(porcentaje);
        		$('#EditarItem #descripcion').val(descripcion);
        		$("#EditarItem #tipo_item option[value="+tipo_item+"]").attr("selected",true);
	}

	function editar_subitem(id,nombre,porcentaje,descripcion){

				$('#EditarSubitem').openModal();
				$('#EditarSubitem #id_subitem').val(id);
				$('#EditarSubitem #nombre_subitem').val(nombre);
        		$('#EditarSubitem #porcentaje').val(porcentaje);
        		$('#EditarSubitem #descripcion').val(descripcion);
	}



	function insertarNotaItem(id, matricula, item){
		//var id= $('#'+id).attr('id');
		var nota=$('#item-'+id).html().replace(",",".");

		var ruta= "{{route('nota.store.item')}}";
		

		if(nota<0 || nota>5 || isNaN(nota)){
			if (isNaN(nota)) {
				swal("Espera", "la nota debe ser numerica", "error");
				$('#item-'+id).html("");
			}
			if (nota<0 || nota>5) {
				swal("Espera", "para registrar la nota, ésta no puede ser mayor que 5 ni menor que 0", "error");
				$('#item-'+id).html("");
			}
			
		}else{

			var ruta= "{{route('nota.store.item')}}";

			$.ajax({

				url:ruta,
				type: 'get',
				dataType: 'json',
				data: {matricula:matricula, item:item, nota:nota},
				success:function(data){
					$('#matricula-'+data.id_matricula).html(data.nota);
					console.log(data.nota);
				},error:function(error){
	        		console.log(error);
      			}
			});	

		}	
	}

		function insertarNotaSubitem(id, matricula, subitem){
		//var id= $('#'+id).attr('id');
		var nota=$('#subitem-'+id).html().replace(",",".");

	

		if(nota<0 || nota>5 || isNaN(nota)){

			if (isNaN(nota)) {
				swal("Espera", "la nota debe ser numerica", "error");
			$('#item-'+id).html("");
			}
			if (nota<0 || nota>5) {
				swal("Espera", "para registrar la nota, ésta no puede ser mayor que 5 ni menor que 0", "error");
			$('#item-'+id).html("");
			}
		}else{

			var ruta= "{{route('nota.store.subitem')}}";

			$.ajax({

				url:ruta,
				type: 'get',
				dataType: 'json',
				data: {matricula:matricula, subitem:subitem, nota:nota},
				success:function(data){
					$('#matricula-'+data.id_matricula).html(data.nota);
				},error:function(error){
        		console.log(error);
      			}
			});	
		}

		
		
	}

	</script>
	<script type="text/javascript">

	function eliminar(iditem){
			swal({
        		title: "¿Estas seguro de eliminar el item?",
        		text: "¡No podras recuperar este item!",
        		type: "warning",
        		showCancelButton: true,
        		cancelButtonColor:'#388E3C',
               	confirmButtonColor: '#E53935',
        		confirmButtonText: 'Si, Eliminarlo',
        		cancelButtonText: "Cancelar",
        		closeOnConfirm: false,
        		closeOnCancel: false
        	},
        	function(isConfirm){
            	if (isConfirm){
              		var ruta = "{{route('item.destroy', ['%iditem%'])}}";
              		ruta=ruta.replace('%iditem',iditem);
              		location.href=ruta;
              		swal.close();
              		loading('');
            	} else {
              		swal("Cancelado", "El item esta a salvo", "success");
              	}
        	});
	}

		
	function eliminarSubitem(idsubitem){
	     	swal({
        		title: "¿Estas seguro de eliminar el subitem?",
        		text: "¡No podras recuperar este subitem!",
        		type: "warning",
        		showCancelButton: true,
        		cancelButtonColor:'#388E3C',
               	confirmButtonColor: '#E53935',
        		confirmButtonText: 'Si, Eliminarlo',
        		cancelButtonText: "Cancelar",
        		closeOnConfirm: false,
        		closeOnCancel: false
        	},
        	function(isConfirm){
            	if (isConfirm){
              		var ruta = "{{route('subitem.destroy', ['%idsubitem%'])}}";
              		ruta=ruta.replace('%idsubitem',idsubitem);
              		location.href=ruta;
              		swal.close();
              		loading('');
            	} else {
              		swal("Cancelado", "El subitem esta a salvo", "success");
            	}
        	});

	}
	</script>

@endsection