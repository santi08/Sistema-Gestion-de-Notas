
<div id="detalleProfesores" width="100%">
	 <table width="100%" class="tabla" >
		<thead>
			<tr>
				<th colspan="2">PROFESOR</th>
			</tr>
		</thead>
		<tbody>
			<tr>
		  		<th>Nombre Completo:</th>
		  		<td>{{$profesor->Nombre}} {{$profesor->Apellidos}}</td>	
			</tr>
			<tr>
		  		<th>Correo :</th>
		  		<td>{{$profesor->Correo}}</td>	
			</tr>
			<tr>
		  		<th>Contacto :</th>
		  		<td>{{$profesor->Contacto}}</td>	
			</tr>
			<tr>
				<th>Programa Academico</th>
				<td>{{$programa->NombrePrograma}}</td>	
			</tr>
			<tr>
				<th>Cantidad Asignaturas {{$periodo->Ano}}-{{$periodo->Periodo}}</th>
				<td>{{count($materias)}}</td>	
			</tr>
		</tbody>
	</table>	
</div>
{!! $string !!}

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