@extends('layouts.app')
@section('title','Notas')
@section('content')


<br>
	<h4>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}} </h4>

	<div class="row">
		<div class="col s12 m12 l12">
			<table border="1" class="responsive-table striped bordered">
					<thead>
						<th>Codigo</th>
						<th>Nombre Completo</th>
						<th>T. Mat.</th>
						
							@if (count($estudiantes[0]->items)>0)
								@foreach ($estudiantes[0]->items as $item)
										<th>
											{{$item->nombre}}
											<a data-target="#insertarSubitem" onclick="insertar_subitem({{$item->id}})" class="btn-floating tiny waves-effect waves-light 	green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons small" >add</i></a>

											<a href="{{ route('item.destroy', $item->id)}}" class="btn-floating tiny waves-effect waves-light 	red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons small" >delete</i></a>
										</th>
								@endforeach
							@endif
						
						<th> <a data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn-floating btn-small waves-effect waves-light  modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Insertar item"><i class="material-icons large" >add_circle</i></a>
						</th>
					</thead>
					<tbody>
						@foreach ($estudiantes as $estudiante)
							<tr>
								<td>{{$estudiante->estudiante->codigo}}</td>
								<td>{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</td>
								<td>
									{{$estudiante->tipoMatricula}}
								</td>

								@if (count($estudiante->items)>0)
									@foreach ($estudiante->items as $item)
										<td style="border: 0px; padding: 0px;">
											<center>
												<input type="number" style="width: 40px; text-align: center;" min="0" max="5" step="any" 
												id="{{$item->pivot->id}}" 
												oninput="obtenerNota({{$item->pivot->id}},{{$item->pivot->matricula_id}},{{$item->pivot->item_id}})">
											</center>
										</td>
									@endforeach
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

	function insertar_subitem(id){
   	console.log(id);
    $('#insertarSubitem').openModal();
    $('#id_item').val(id);
	}

	function obtenerNota(id, matricula, item){
		//var id= $('#'+id).attr('id');
		
		var nota= $('#'+id).val();
		var ruta= "{{route('nota.store')}}";

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

	


	</script>

@endsection