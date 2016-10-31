				<table class="responsive-table striped bordered" id="asignaturas">
						<thead >
							<th>Código</th>
							<th>Nombre</th>
							<th>Creditos</th>
							<th>Grupo</th>
							<th>Acciones</th>
						</thead>

						<tbody>
							@foreach($horarios as $horario)
								<tr>
									<td>{{$horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
									<td>{{$horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
									<td>{{$horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
									<td>{{$horario->Grupo}}</td>
									<td>
										<a class="btn-floating red darken-1"><i class="material-icons">picture_as_pdf</i></a></li>
										<a class="btn-floating light-blue darken-3"><i class="material-icons">insert_chart</i></a></li>
										<a class="btn-floating grey darken-1"><i class="material-icons">visibility</i></a></li>
									</td>
								</tr>
							@endforeach
					
						</tbody>
				</table>
				{!!$horarios->render()!!}	
	

