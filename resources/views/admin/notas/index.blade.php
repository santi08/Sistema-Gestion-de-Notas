@extends('layouts.app')
@section('title','Notas')
@section('content')


<br>
	<h4>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}} </h4>


	<table border="1">
		<thead>
			<th>Codigo</th>
			<th>Nombre Completo</th>
			<th>T. Mat.</th>
			
				@if (count($estudiantes[0]->items)>0)
					@foreach ($estudiantes[0]->items as $item)
							<th>
								{{$item->nombre}}
								<a data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn-floating tiny waves-effect waves-light 	green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar subitem"><i class="material-icons" >		assignment_ind</i></a>
							</th>
					@endforeach
				@endif
			
			<th> <a data-target="#insertarItem" onclick="insertar_item({{ $asignatura->Id}})" class="btn-floating btn-small waves-effect waves-light 	green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Insertar item"><i class="material-icons" >		assignment_ind</i></a>
			</th>
		</thead>
		<tbody>
		@foreach ($estudiantes as $estudiante)
			<tr>
				<td>
					{{$estudiante->estudiante->codigo}}
				</td>
				<td>	
				{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}}{{$estudiante->estudiante->segundoNombre}}
				</td>
				<td>
					{{$estudiante->tipoMatricula}}
				</td>

				@if (count($estudiante->items)>0)
					@foreach ($estudiante->items as $item)
						<td>
							{{$item->nota}}
						</td>
					@endforeach
				@endif

			</tr>
		@endforeach
			
		</tbody>
		
	</table>
@include('admin.notas.modales.items')
@endsection 

@section('scripts')

	<script type="text/javascript">
		
	function insertar_item(id){
   	
    $('#insertarItem').openModal();
    $('#horario').val(id);
    $('#tipo_item').material_select();
    
  	}
	</script>

@endsection