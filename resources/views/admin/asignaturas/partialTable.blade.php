<table class="responsive-table striped bordered" id="asignaturas">
	<thead >
		<th>Código</th>
		<th>Nombre</th>
		<th class="center">Creditos</th>
		<th class="center">Grupo</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		@foreach($asignaturas as $asignatura)
			<tr>
				<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
				<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
				<td class="center">{{$asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
				<td class="center">{{$asignatura->Grupo}}</td>
				<td>
					<a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

                    <a href="#" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " onclick="matricular({{$asignatura->Id}})" data-target="#matricular" data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons">assignment_ind</i></a>

                    <a onclick="return ver({{$asignatura->Id}});" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosMaterias'  data-tooltip="Ver"><i class="material-icons">visibility</i></a>
				</td>
			</tr>
		@endforeach		
	</tbody>
</table>

<div class="center">
    {{$asignaturas->render()}}  
</div>	


				
	

