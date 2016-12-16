<!DOCTYPE>
<html>
<head>
	<title>Reporte General</title>
</head>
<body>
	<table class="tabla" border="1" align="center">
		<thead>
			<tr>
				<th colspan="2">INFORME SEMESTRAL</th>
			</tr>
			<tr>
				<th>Programa</th>
				<td>{{$programa->NombrePrograma}}</th>
			</tr>
			<tr>
				<th>Director</th>
				<td>{{$programa->usuario->Nombre}} {{$programa->usuario->Apellidos}}</th>
			</tr>
			<tr>
				<th>Correo</th>
				<td>{{$programa->usuario->Correo}}</th>
			</tr>
			<tr>
				<th>Periodo</th>
				<td>{{$periodo->Ano}}-{{$periodo->Periodo}}</th>
			</tr>
			<tr>
				<th>Cantidad de Estudiantes Matriculados</th>
				<td>{{$ponderado['cantidadEstudiantesMatriculados']}}</th>
			</tr>
			<tr>
				<th>Cantidad de Asignaturas</th>
				<td>{{$ponderado['cantidadAsignaturas']}}</th>
			</tr>
			<tr>
				<th>Cantidad de Profesores</th>
				<td>{{$ponderado['cantidadProfesores']}}</th>
			</tr>

			<tr>
				<th>Estudiantes que reprobaron <br> al menos una materia</th>
				<td>{{$ponderado['reprobadoMaterias']['cantidadReprobados']}}</th>
			</tr>
			<tr>
				<th>Estudiantes que reprobaron <br> al menos una materia<br> EN CALIDAD DE REPITENTE</th>
				<td>{{$ponderado['reprobadoMaterias']['RcantidadReprobados']}}</th>
			</tr>
		</thead>

		
	</table>

	<table></table>

</body>
</html>
<style type="text/css">
	
.tablaSinBorde{
	border-collapse: collapse;
}

.tabla { font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;  text-align: left;  border-collapse: collapse; padding: 4px ;}

.tabla th{
  font-size: 13px; font-weight: normal; background: #cfd8dc;
    border-top: 1.5px solid #515151;   color: #000; 
    text-align:center;	
}    

.tabla td{     background: #f5f5f5;
    color: #000000; border-top: 1px solid transparent;
    text-align: center;     }

.itemPerdido {
   background-color: #FF6C6C;
}   
.itemSinNota{
	background-color: yellow;
} 

.definitivaPerdida{
	background-color: #DA8B8B;	
}
</style>
