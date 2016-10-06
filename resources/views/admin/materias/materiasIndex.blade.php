@extends('layouts.app')
@section('title','Materias')

@section('content')
	<h4 class="center">Asignaturas</h4>


	<div class="row">

		<div class="col s12 m12 l12">
			<div class="row">
				<div class="col offset-l9">
					<a href="{{route('admin.notasIndex.index')}}" class="waves-effect waves-light btn">Registrar notas</a>
				</div>
				
			</div>
<hr>
			<div class="row">
				<div class="col l12">
					<table>
						<thead class="responsive-table striped bordered">
							<th>Código</th>
							<th>Nombre</th>
							<th>Creditos</th>
							<th>Grupo</th>
							<th>Acciones</th>
						</thead>

						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
	
		</div>

	</div>



@endsection