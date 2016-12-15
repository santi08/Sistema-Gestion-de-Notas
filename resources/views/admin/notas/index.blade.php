@extends('layouts.appNota')
@section('title','Notas')
@section('content')
<br>

<div class="row">
	<div class="col s12 m12 l12">
			<fieldset class=" grey lighten-4">
				<div class="row">
					<div class="col s12 m7 l6">
						<h5>Asignatura: {{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</h5>
					</div>
					<div class="col s12 m6 l4">
						<h5>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}}</h5> 
					</div>
					<div class="col s12 m4 l2">
						<h5>Grupo: {{$asignatura->Grupo}}</h5></div>
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
                  	<div class="card-content white-text" style="height: 1%""> 
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
			 <div class="col s6 m6 l6">
					<button data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn waves-light waves-effect  teal lighten-2"><i class="material-icons large modal-trigger" >add_circle</i> Agregar Item</button>
			</div>
		</div>
@endif


			</div>
<br>
<div class="divider grey darken-1"></div>
			
<div id="mainTable" class="section">
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

									<th nowrap="" class="floatThead-col center" style="border: 1px solid black;" colspan="{{count($item->subitems)}}">{{$item->nombre}} ({{$item->porcentaje}} %)

									@if ($item->tipoitem->nombre != "PARCIALES")

										<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem " ><i class="material-icons green-text" >add</i></a>
									@endif

										<a onclick="eliminar({{$item->id}});" id="{{$item->id}}" class="modal-trigger btn-warning-cancel btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons red-text" id="eliminar" >delete</i></a>
									</th>
								@else
									<th class="floatThead-col center" style="border: 1px solid black;" rowspan="2" align="center">{{$item->nombre}} ({{$item->porcentaje}} %)
										<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="modal-trigger btn-flat  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons green-text" >add</i></a>

										<a onclick="eliminar({{$item->id}});" class="modal-trigger btn-flat tooltipped btn-warning-cancel" data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons red-text" id="eliminar">delete</i></a>
									</th>


								@endif
							@endforeach
						@endif
							<tr style="border: 1px solid black;">
							@foreach ($estudiantes[0]->items as $item)			
								@if (count($item->subitems)>0)			
									@foreach ($item->subitems as $subitem)
										<th nowrap class="floatThead-col center" style="border: 1px solid black;">{{$subitem->nombre}}
										@if ($subitem->item->tipoitem->nombre != "PARCIALES")
											({{$subitem->porcentaje}}%) 
										@endif 
											<a  onclick="eliminarSubitem({{$subitem->id}});" class="modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar subitem"><i class="material-icons red-text" >delete</i></a>

										</th>
									@endforeach
								@endif	
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($estudiantes as $estudiante)
							<tr style="border: 1px solid black;">
								<th nowrap style="border: 1px solid black;">{{$estudiante->estudiante->codigo}}</th>
								<th nowrap style="border: 1px solid black;">{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</th>
								<th style="border: 1px solid black;">
									{{$estudiante->tipoMatricula}}
								</th>
								<th nowrap id="matricula-{{$estudiante->id}}" style="border: 1px solid black;">{{$estudiante->definitiva}}</th>
								@if (count($estudiante->items)>0)
									@foreach ($estudiante->items as $item)
										@if (count($item->subitems)>0)
											@foreach ($estudiante->subitems as $subitem)

												@if($item->id == $subitem->item_id)
													<td id="subitem-{{$subitem->pivot->id}}" onchange="insertarNotaSubitem({{$subitem->pivot->id}},{{$subitem->pivot->matricula_id}},{{$subitem->pivot->subitem_id}})" align="center"
															style="border: 1px solid black;"
													>{{$subitem->pivot->nota}}</td>
												@endif
											@endforeach										
										@else
											<td tabindex="1" id="item-{{$item->pivot->id}}" align="center" 
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




	@include('admin.notas.modales.subitems')
	@include('admin.notas.modales.subitems-parcial')
	@include('admin.notas.modales.items')
	
@endsection 

@section('scripts')
	
	<script type="text/javascript">
		$('#mainTable').editableTableWidget().find('td:first').focus();
		
		$('#mainTable').floatThead({
   		 	position: 'fixed',
			top:64,
		});	

		$(document).ready(function(){ 

		$("#insertarItem").addClass("modalInsertarItem");
	 	$("#insertarSubitem").addClass("modalInsertarSubItem");
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



	function insertarNotaItem(id, matricula, item){
		//var id= $('#'+id).attr('id');
		var nota=$('#item-'+id).html();
		console.log(nota);	
		var ruta= "{{route('nota.store.item')}}";

		if(nota<0 || nota>5){
			swal("Espera", "para registrar la nota, ésta no puede ser mayor que 5 ni menor que 0", "error");
			$('#item-'+id).html("");
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
		var nota=$('#subitem-'+id).html();

		
		if(nota<0 || nota>5){

			swal("Espera", "para registrar la nota, ésta no puede ser mayor que 5 ni menor que 0", "error");
			$('#subitem-'+id).html("");
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
            	} else {
              		swal("Cancelado", "El item esta a salvo", "error");
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
            	} else {
              		swal("Cancelado", "El subitem esta a salvo", "error");
              		location.reload();
            	}
        	});

	}
	</script>

@endsection