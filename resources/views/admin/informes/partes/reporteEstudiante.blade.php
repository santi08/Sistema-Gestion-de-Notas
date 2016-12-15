<div id="detalleProfesores" width="100%">
	 <table width="100%" class="tabla" >
		<thead>
			<tr>
				<th colspan="2">Estudiante</th>
			</tr>
		</thead>
		<tbody>
			<tr>
		  		<th>Nombre Completo:</th>
		  		<td>{{$estudiante->primerNombre}} {{$estudiante->segundoNombre}} {{$estudiante->primerApellido}} {{$estudiante->segundoApellido}}</td>	
			</tr>
			<tr>
		  		<th>Correo :</th>
		  		<td>{{$estudiante->email}}</td>	
			</tr>
			<tr>
		  		<th>Codigo :</th>
		  		<td>{{$estudiante->codigo}}</td>	
			</tr>
			<tr>
				<th>Programa Academico</th>
				<td>{{$estudiante->id_programaAcademico}}</td>	
			</tr>
			<tr>
				<th>Cantidad Asignaturas {{$periodo->Ano}}-{{$periodo->Periodo}}</th>
				<td></td>	
			</tr>
		</tbody>
	</table>	
</div>
<style type="text/css">


.tablaSinBorde{
	border-collapse: collapse;
}

.tabla { font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;  text-align: left;  border-collapse: collapse; padding: 4px}

.tabla th{
  font-size: 13px; font-weight: normal; background: #cfd8dc;
    border-top: 1.5px solid #515151;   color: #000; 
    text-align:center;	
}    

.tabla td{     background: #f5f5f5;
    color: #000000; border-top: 1px solid transparent;
    text-align: center;     }

.itemPerdido {
   background-color: #FE6100;
}   
.itemSinNota{
	background-color: yellow;
} 

.definitivaPerdida{
	background-color: #FF2727;	
}
</style>
