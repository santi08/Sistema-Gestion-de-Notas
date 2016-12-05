<table class="responsive-table  bordered" id="asignaturas">
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
					<a href="#" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons red-text ">picture_as_pdf</i></a>

                    <a data-target="#matricular" onclick="matricular({{ $asignatura->Id }})" class=" modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons green-text" >assignment_ind</i></a>

                    <a onclick="return ver({{$asignatura->Id}});" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosAsignaturas' data-tooltip="Ver"><i class="material-icons blue-text ">visibility</i></a>
				</td>
			</tr>
		@endforeach		
	</tbody>
</table>

<div class="center">
    {{$asignaturas->render()}}  
</div>	


				
	

