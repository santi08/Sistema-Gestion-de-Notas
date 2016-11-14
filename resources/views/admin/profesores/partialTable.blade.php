<table class="striped">
				<thead>
					<tr>
						<th>Apellidos</th>
					<th>Nombre</th>
					<th>Programa</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
					@foreach($profesores as $profesor)
						<tr>
							<td>{{$profesor->Apellidos}}</td>
							<td>{{$profesor->Nombre}}</td>
							<td>{{$profesor->NombrePrograma}}</td>
							<td>
								<a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

								<a onclick="ver({{$profesor->Id}},{{$profesor->idprograma}})"  class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver" data-target="#ver"><i class="material-icons">visibility</i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>					
			<div class="paginate">
				{{ $profesores->render()}}
			</div>