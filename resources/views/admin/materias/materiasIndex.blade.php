@extends('layouts.app')
@section('title','Materias')

@section('content')
	<h4 class="center">Asignaturas</h4>


	<div class="row">

		<div class="col s12 m12 l12">
				<div class="row">

			<div class="input-fiel col s3">
				<label>Periodo Academico</label>		
				<select>
					<option value="1" disabled selected>Seleccione una opción</option>
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
						  			
				    <option value="{{ $PeriodoAcademico->Id}}">
				    {{ $PeriodoAcademico->Ano}} - {{ $PeriodoAcademico->Periodo }}
				    </option>

					@endforeach
						  			
				</select>
					  	
			</div>	
			

			
					<div class="input-fiel col s5">
						<label>Programa Academico</label>
						<select>
							<option value="" disabled selected>Seleccione una opción</option>

							@foreach($ProgramasAcademicos as $ProgramaAcademico)
								@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
									<option value="{{$ProgramaAcademico->id}}">		
									
									{{ $ProgramaAcademico->NombrePrograma }}
								</option>
								@endif
							@endforeach
						
						</select>
						
						  			
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

						@foreach ($asignaturas as $asignatura)
						<tr>
							<td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
							<td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
							<td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
							<td>{{ $asignatura->Grupo}}</td>
							<td>  <a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

							  <a href="#" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons">assignment_ind</i></a>

							   <a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Estudiantes"><i class="material-icons">visibility</i></a>

							</td>


								
						</tr>
						@endforeach
						

						<tbody>
							
						</tbody>
					</table>
					<div>
						{{ $asignaturas->render() }}
					</div>
				</div>
			</div>
	
		</div>

	</div>



@endsection