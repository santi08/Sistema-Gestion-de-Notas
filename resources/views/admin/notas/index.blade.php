@extends('layouts.app')
@section('title','Notas')
@section('content')


<br>
	<h4>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}} </h4>
			<a data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn-floating btn-small waves-effect waves-light  modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Insertar item"><i class="material-icons large" >add_circle</i></a>
			<div class="row">
		<div class="col s12 m12 l12">
			<table border="1">
					<thead>
						<th rowspan="2">Codigo</th>
						<th rowspan="2">Nombre Completo</th>
						<th rowspan="2">T. Mat.</th>
						<th rowspan="2">DEF</th>						
						
							@if (count($estudiantes[0]->items)>0)

								@foreach ($estudiantes[0]->items as $item)

									@if (count($item->subitems)>0)
										<th colspan="{{count($item->subitems)}}">
											{{$item->nombre}}
											<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="btn-floating tiny waves-effect waves-light 	green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons small" >add</i></a>

											<a href="{{route('item.destroy', $item->id)}}" class="btn-floating tiny waves-effect waves-light 	red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons small" >delete</i></a>
										</th>
											<tr>
												@foreach ($item->subitems as $subitem)
													<th>{{$subitem->nombre}}</th>
												@endforeach
											</tr>
										
										
									@else

										<th>
											{{$item->nombre}}
											<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="btn-floating tiny waves-effect waves-light 	green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons small" >add</i></a>

											<a href="{{route('item.destroy', $item->id)}}" class="btn-floating tiny waves-effect waves-light 	red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons small" >delete</i></a>
										</th>
									@endif
								@endforeach
							@endif
					</thead>
					<tbody>
						@foreach ($estudiantes as $estudiante)
							<tr>
								<td>{{$estudiante->estudiante->codigo}}</td>
								<td>{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</td>
								<td>
									{{$estudiante->tipoMatricula}}
								</td>
								<td>{{$estudiante->definitiva}}</td>

								@if (count($estudiante->items)>0)
									@foreach ($estudiante->items as $item)

										@if (count($item->subitems)>0)
											@foreach ($estudiante->subitems as $subitem)
												<td style="border: 0px; padding: 0px;">
													<center>
														<input type="number" min="0" max="5" step="any" style="width: 40px; text-align: center;" min="0" max="5" step="any" 
														id="subitem-{{$subitem->pivot->id}}" 
														oninput="insertarNotaSubitem({{$subitem->pivot->id}},{{$subitem->pivot->matricula_id}},{{$subitem->pivot->subitem_id}})">
													</center>
												</td>
											@endforeach										
										@else

										<td style="border: 0px; padding: 0px;">
											<center>
												<input type="number" min="0" max="5" step="any" style="width: 40px; text-align: center;" min="0" max="5" step="any" 
												id="item-{{$item->pivot->id}}"  
												oninput="insertarNotaItem({{$item->pivot->id}},{{$item->pivot->matricula_id}},{{$item->pivot->item_id}})">
											</center>
										</td>


										@endif
									@endforeach
								@endif

								@if (count($estudiante->subitems)>0)
									
								@endif
							</tr>
						@endforeach
						
					</tbody>	
			</table>
		</div>		
	</div>

	@include('admin.notas.modales.subitems')
	@include('admin.notas.modales.items')
	
@endsection 




@section('scripts')

	

	<script type="text/javascript">
		
	function insertar_item(id){
   	
    $('#insertarItem').openModal();
    $('#horario').val(id);
    $('#tipo_item').material_select();
	}

	function insertar_subitem(id,nombre){
   	

    $('#insertarSubitem').openModal();
    $('#id_item').val(id);
    $('#nombre_item').val(nombre);
	}


	function insertarNotaItem(id, matricula, item){
		//var id= $('#'+id).attr('id');
		var nota=$('#item-'+id).val();
		
		if(nota<0 || nota>5){

			alert("error");
		}	

		
		var ruta= "{{route('nota.store.item')}}";

		$.ajax({

			url:ruta,
			type: 'get',
			dataType: 'json',
			data: {matricula:matricula, item:item, nota:nota},
			success:function(data){
				console.log('entro');
			},error:function(error){
        		console.log(error);
      		}


		});	
	}

		function insertarNotaSubitem(id, matricula, subitem){
		//var id= $('#'+id).attr('id');
		var nota=$('#subitem-'+id).val();

		
		if(nota<0 || nota>5){

			alert("error");
		}

		
		var ruta= "{{route('nota.store.subitem')}}";

		$.ajax({

			url:ruta,
			type: 'get',
			dataType: 'json',
			data: {matricula:matricula, subitem:subitem, nota:nota},
			success:function(data){
				console.log('entro');
			},error:function(error){
        		console.log(error);
      		}


		});	
	}


	


	</script>

@endsection