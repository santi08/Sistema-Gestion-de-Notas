@extends('layouts.app')
@section('title','Profesores')

@section('content')
	
	<table class="responsive-table striped">
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Programa</th>
				<th>asignatura</th>
				
			</thead>
			<tbody>
				@foreach($profesores as $profesor)
					<tr>

						<td>{{$profesor->Nombre}}</td>
						<td>{{$profesor->Apellidos}}</td>
						<td>{{$profesor->NombrePrograma}}</td>
						<td>{{$profesor->Asignatura}}</td>
					</tr>
					

				@endforeach
				
			</tbody>

	</table>
		<ul class="pagination">
			{{$profesores->links()}}
		</ul>
		
	
	
	

@endsection

 


         