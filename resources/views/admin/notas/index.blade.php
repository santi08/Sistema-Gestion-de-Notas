<!DOCTYPE html>
<html>
<head>
	<title>Notas</title>
</head>
<body>
{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}
<br>
<h4>Periodo Academico: {{$asignatura->periodoAcademico->Ano}}-{{$asignatura->periodoAcademico->Periodo}} </h4>


<table border="1">
	<thead>
		<th>Codigo</th>
		<th>Nombre Completo</th>
		<th>T. Mat.</th>
	</thead>
	<tbody>
	@foreach ($estudiantes as $estudiante)
		<tr>
			<td>
				{{$estudiante->estudiante->codigo}}
			</td>
			<td>	
			{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}}{{$estudiante->estudiante->segundoNombre}}
			</td>
			<td>
				{{$estudiante->tipoMatricula}}
			</td>
			<td>
				<input type="text" size="1px" name="">
			</td>

		</tr>
	@endforeach
		
	</tbody>
	
</table>

</body>
</html>