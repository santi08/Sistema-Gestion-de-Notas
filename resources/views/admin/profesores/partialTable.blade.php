
<table id="data-table" class="responsive-table  bordered display dataTable"  aria-describedby="data-table-simple_info">
	<thead>
		<tr>
			<th>Nombre Completo</th>
			<th>Programa</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Nombre Completo</th>
			<th>Programa</th>
			<th>Acciones</th>
		</tr>
	</tfoot>
	<tbody>
		@foreach($profesores as $profesor)
			<tr>
				<td>{{$profesor['Nombre']}} {{$profesor['Apellidos']}}</td>
				<td>{{$profesor['NombrePrograma']}}</td>
                <td>
                    <a onclick="generarPdf({{$profesor['Id']}},{{$profesor['idprograma']}})" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

                   	<a onclick="ver({{$profesor['Id']}},{{$profesor['idprograma']}})" class="btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver" data-target="#ver"><i class="material-icons blue-text text-darken-3">visibility</i></a>				
				</td>
			</tr>			
        @endforeach
	</tbody>
</table>					
