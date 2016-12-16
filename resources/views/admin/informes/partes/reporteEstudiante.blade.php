<div id="detalleEstudiante" width="100%" >
	 <table width="100%" class="tabla" border="1">
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
				<td>{{count($asignaturas)}}</td>	
			</tr>
		</tbody>
	</table>

@foreach($matriculasPorPeriodo as $matricula)
	<table border="1" class="tabla" id="asignaturasEstudiantes" align="center">
		<thead>
				<tr >
					<th colspan="{{count($matricula->items)}}"> {{$matricula->horario->programaAcademicoAsignatura->asignatura->Nombre}}
					</th>
				</tr>
				<tr >
					<th colspan="{{(count($matricula->items))}}">Porfesor: {{$matricula->horario->usuario->Nombre}}
					</th>
				</tr>
				<tr >
					@if($matricula->definitiva > 3)
						<td colspan="{{(count($matricula->items))}}">
							Definitiva: {{$matricula->definitiva}}
						</td>
					@else
						<td colspan="{{(count($matricula->items))}}" class="definitivaPerdida">
							Definitiva: {{$matricula->definitiva}}
						</td>
					@endif
				</tr>	
		</thead>
		<tbody> 
 			<tr>
					@foreach($matricula->items as $item)
					<th> {{$item->nombre}}</th>
					@endforeach
			</tr>
				
				@foreach($matricula->items as $item)
					@if($item->pivot->nota >= 3 and !$item->pivot->nota == "")
			   			<td>{{$item->pivot->nota}}</td>
			 		@elseif($item->pivot->nota == "")
	           			<td class="itemSinNota">{{$item->pivot->nota}}</td>
			 		@else   
	           			<td class="itemPerdido">{{$item->pivot->nota}}</td> 
			 		@endif
				@endforeach	
		</tbody>
	</table>	
	<br>
@endforeach


</div>
<style type="text/css">
#asignaturasEstudiante{
	margin-left: auto;
    margin-right: auto;
}

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
