@extends('layouts.modal')

@section('id')'verDatosAsignaturas'
@overwrite

@section('contenido')
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="row">
				<div class="col s12 m12 l12">
					<h5 class="center" id="nombreMateria"></h5>
			</div>
			<div class="row">
				<div class="col s12 m12 l12">
					<fieldset class="grey lighten-3">
					<table class="bordered">
						<thead>
							<tr>
								<th>Profesor</th>
								<th>Estudiantes Matriculados</th>		
							</tr>
						</thead>
						<tbody id="tablaAsignaturas">			
						</tbody>
					</table>
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12">
					
				</div>
			</div>

		</div>
	</div>


@overwrite