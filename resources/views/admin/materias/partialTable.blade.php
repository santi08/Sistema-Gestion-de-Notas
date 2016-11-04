				<table class="responsive-table striped bordered" id="asignaturas">
						<thead >
							<th>Código</th>
							<th>Nombre</th>
							<th>Creditos</th>
							<th>Grupo</th>
							<th>Acciones</th>
						</thead>

						<tbody>
							@foreach($asignaturas as $asignatura)
								<tr>
									<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
									<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
									<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
									<td>{{$asignatura->Grupo}}</td>
									<td>
										 <a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

                              <a href="#" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons">assignment_ind</i></a>

                               <a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Estudiantes"><i class="material-icons">visibility</i></a>

									</td>
								</tr>
							@endforeach
					
						</tbody>
				</table>
				{!!$asignaturas->render()!!}	
	

