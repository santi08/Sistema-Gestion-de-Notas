@extends('layouts.app')
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
            <div id="card-alert" class="card {{ session('flash_notification.level') }}" style="height: 2%">
                  <div class="card-content white-text">
                        <p>
                       
                           {!! session('flash_notification.message') !!}

                       
                        </p>
                  </div>
                      
            </div>
         @endif
<br>
			<div class="row">
				<div class="col s12 m12 l12">
					<button data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn waves-light waves-effect  teal lighten-2"><i class="material-icons large modal-trigger" >add_circle</i> Agregar Item</button>
				</div>	
			</div>
<br>
<div class="divider grey darken-1"></div>
			
			<div class="row">
				<div class="col s12">
					<table border="1" class="bordered  centered responsive-table">
						<thead>
							<th rowspan="2" style="height:105px;">Codigo</th>
							<th rowspan="2">Nombre Completo</th>
							<th rowspan="2">T. Mat.</th>
							<th rowspan="2">DEF</th>
							@if (count($estudiantes[0]->items)>0)
								@foreach ($estudiantes[0]->items as $item)
									@if (count($item->subitems)>0)
										<th colspan="{{count($item->subitems)}}">{{$item->nombre}} {{$item->porcentaje}} %
									
											<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons green-text" >add</i></a>

											<a href="{{route('item.destroy', $item->id)}}" class="modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons red-text" >delete</i></a>

										</th>

										
									@else
										<th rowspan="2">{{$item->nombre}} {{$item->porcentaje}} %
											<a data-target="#insertarSubitem" 
											onclick="insertar_subitem({{$item->id}},'{{$item->nombre}}')" class="modal-trigger btn-flat  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons green-text" >add</i></a>
											<a href="{{route('item.destroy', $item->id)}}" class="modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons red-text" >delete</i></a>
										</th>

									@endif
								@endforeach
							@endif
							<tr>
							@foreach ($estudiantes[0]->items as $item)			
								@if (count($item->subitems)>0)			
									@foreach ($item->subitems as $subitem)
										<th>{{$subitem->nombre}}
										<a href="{{route('subitem.destroy', $subitem->id)}}" class="modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar subitem"><i class="material-icons red-text" >delete</i></a>
										</th>
									@endforeach		
								@endif	
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($estudiantes as $estudiante)
							<tr>
								<td>{{$estudiante->estudiante->codigo}}</td>
								<td>{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</td>
								<td>
									{{$estudiante->tipoMatricula}}
								</td>
								<td id="matricula-{{$estudiante->id}}">{{$estudiante->definitiva}}</td>
								@if (count($estudiante->items)>0)
									@foreach ($estudiante->items as $item)
										@if (count($item->subitems)>0)
											@foreach ($estudiante->subitems as $subitem)

												@if($item->id == $subitem->item_id)
													<td style="border: 0px; padding: 0px;">
													<center>
														<input type="number" min="0" max="5" step="any" style="width: 40px; text-align: center;" min="0" max="5" step="any" 
														id="subitem-{{$subitem->pivot->id}}" 
														value="{{$subitem->pivot->nota}}"  
														oninput="insertarNotaSubitem({{$subitem->pivot->id}},{{$subitem->pivot->matricula_id}},{{$subitem->pivot->subitem_id}})">
													</center>
													</td>
												@endif
											@endforeach										
										@else
											<td style="border: 0px; padding: 0px;">
												<center>
												<input type="number" min="0" max="5" step="any" style="width: 40px; text-align: center;" min="0" max="5" step="any" 
												id="item-{{$item->pivot->id}}"
												value="{{$item->pivot->nota}}" 
												oninput="insertarNotaItem({{$item->pivot->id}},{{$item->pivot->matricula_id}},{{$item->pivot->item_id}})">
												</center>
											</td>
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
	
@endsection 

@section('scripts')

	

	<script type="text/javascript">
	 $(document).ready(function(){ 
	 	$("#insertarItem").addClass("modalInsertarItem");
	 	$("#insertarSubitem").addClass("modalInsertarSubItem");
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
				$('#matricula-'+data.id_matricula).html(data.nota);
				console.log(data.nota);
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
				$('#matricula-'+data.id_matricula).html(data.nota);
			},error:function(error){
        		console.log(error);
      		}


		});	
	}


	


	</script>

@endsection