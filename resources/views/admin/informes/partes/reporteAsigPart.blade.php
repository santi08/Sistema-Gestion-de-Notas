<hr>
<div id="tablaAsignatura" >
 <table width="100%" class="tabla" >
	<thead>
		<tr>
			<th colspan="2">ASIGNATURA</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		    <th>Nombre :</th>
			<td>{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
		</tr>
		<tr>
		  <th>Codigo :</th>
		  <td>{{$asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>	
		</tr>
		<tr>
		  <th>Grupo :</th>
		  <td>{{$asignatura->Grupo}}</td>	
		</tr>
		<tr>
		  <th>Profesor :</th>
		  <td>{{$asignatura->usuario->Nombre}} {{$asignatura->usuario->Apellidos}}</td>	
		</tr>
	</tbody>
</table>	
</div>
<br>

<div id="tablaMatriculados">

 <table  width="100%" class="tabla"  >
	<thead >
		<tr >
			<th colspan="3" >ESTUDIANTES MATRICULADOS</th>
		</tr>
		<tr>
			<th >NUEVOS</th>
			<th >REPITENTES</th>
			<th >TOTAL :</th> 
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{count($asignatura->matriculas()->where('tipoMatricula','=','N')->get())}}</td> 
		    <td >{{count($asignatura->matriculas()->where('tipoMatricula','!=','N')->get())}}</td>
		    <td>{{count($estudiantes)}}</td>	
		</tr>
	</tbody>
  </table>
  	
</div>

<div id="tablaCriterios">
  <table width="100%" class="tabla" style="border-style: hidden;">
		<tr>
			<th colspan="3" align="center">CRITERIO DE EVALUACION</th>
	    </tr> 		
	    <tr>
	     	<th style="border-style: hidden;">Criterios</th>
	     	@foreach($asignatura->matriculas[0]->items as $item)
	        <th>{{$item->nombre}}</th>   	
		    @endforeach
         </tr>
         <tr>
         	<th style="border-style: hidden;">Porcentaje</th>
			@foreach($asignatura->matriculas[0]->items as $item)
		      <td align="center">{{$item->porcentaje}} %</td>		   	
	     	@endforeach
         </tr>			
  </table>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<div align="center"> 
  <table border="1" class="tablaSinBorde " id="tablaEstudiantes">
 	<thead>
 		<tr>
 			<th colspan="3">Aprobaron </th>
 			<th>{{$ponderadoDefinitiva['aprobados']}} </th>
 			@foreach($itemsPerdidos as $perdidos)
 	    	<th>
 	    		{{$perdidos['aprobados']}}
 	    	</th>
 			@endforeach
 		</tr>
 	    <tr>
 	    	<th colspan="3">Reprobaron  </th>
 	    	<th>{{$ponderadoDefinitiva['reprobados']}} </th>
 	    	@foreach($itemsPerdidos as $perdidos)
 	    	<th>
 	    		{{$perdidos['reprobados']}}
 	    	</th>
 			@endforeach
 	    </tr>
 		<tr>
 			<th>codigo</th>
 			<th>nombre</th>
 			<th>tipo Matricula</th>
 			<th>Definitiva</th>
 			@foreach($asignatura->matriculas[0]->items as $item)
		     <th>{{$item->nombre}}</th>
		    @endforeach
 		</tr>
 	</thead>
 	<tbody>
 	
 	@foreach($estudiantes as $estudiante)
 		
 		@if($estudiante->definitiva > 3)
 	 		<tr>
 				<td>{{$estudiante->estudiante->codigo}}</td>
				<td>{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</td>
				<td>{{$estudiante->tipoMatricula}}</td>
				<td>{{$estudiante->definitiva}}</td>
		@else
			<tr>
 				<td >{{$estudiante->estudiante->codigo}}</td>
				<td >{{$estudiante->estudiante->primerApellido}} {{$estudiante->estudiante->segundoApellido}} {{$estudiante->estudiante->primerNombre}} {{$estudiante->estudiante->segundoNombre}}</td>
				<td >{{$estudiante->tipoMatricula}}</td>
				<td class="definitivaPerdida">{{$estudiante->definitiva}}</td>
		@endif		
		@if(count($asignatura->items) > 0)
			@foreach($asignaturas->items as $item)
				@if($item->pivot->nota >= 3 and !$item->pivot->nota == "")
			   		<td>{{$item->pivot->nota}}</td>
			 	@elseif($item->pivot->nota == "")
	           		<td class="itemSinNota">{{$item->pivot->nota}}</td>
			 	@else   
	           		<td class="itemPerdido">{{$item->pivot->nota}}</td> 
			 	@endif
			@endforeach
		@endif	
 	 		</tr>
 	@endforeach
 	</tbody>
 </table>	
</div>
<style type="text/css">
#tablaEstudiantes{
	margin-left: auto;
    margin-right: auto;
}
#tablaAsignatura{
	margin: auto;
	width: 50%;
}
#tablaMatriculados{
	float:left;
	width: 50%;
}
#tablaCriterios{
	float:left;
    width: 50%	
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
   background-color: #FF6C6C;
}   
.itemSinNota{
	background-color: yellow;
} 

.definitivaPerdida{
	background-color: #DA8B8B;	
}
</style>