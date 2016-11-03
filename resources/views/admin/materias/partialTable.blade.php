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
										<a class="btn-floating red darken-1"><i class="material-icons">picture_as_pdf</i></a></li>
										<a class="btn-floating light-blue darken-3"><i class="material-icons">insert_chart</i></a></li>
										<a class="btn-floating grey darken-1"><i class="material-icons">visibility</i></a></li>
									</td>
								</tr>
							@endforeach
					
						</tbody>
				</table>
				{!!$asignaturas->render()!!}	
	

