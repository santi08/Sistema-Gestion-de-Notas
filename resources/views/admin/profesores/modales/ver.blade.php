@extends('layouts.modal')

@section('id')'ver'
@overwrite

@section('contenido')
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="row">
				<div class="col s12 m12 l12">
					<h5 class="center gradient darken-3 white-text" id="nombreProfesor"></h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12">
					<table class="responsive-table striped bordered">
						<thead>
							<tr>
								<th>Código</th>
								<th>Asignatura</th>
								<th>Creditos</th>
							</tr>
						</thead>
						<tbody id="tablaAsignaturas">			
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@overwrite