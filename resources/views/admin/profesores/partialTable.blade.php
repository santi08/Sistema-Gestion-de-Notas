<table class="responsive-table  bordered">
	<thead>
		<tr>
			<th>Nombre Completo</th>
			<th>Programa</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($profesores as $profesor)
			<tr>
				<td>{{$profesor['Nombre']}} {{$profesor['Apellidos']}}</td>
				<td>{{$profesor['NombrePrograma']}}</td>
				<td>
                    <a href="#" class=" btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons red-text">picture_as_pdf</i></a>

                    <a onclick="ver({{$profesor['Id']}},{{$profesor['idprograma']}})" class="btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver" data-target="#ver"><i class="material-icons blue-text text-darken-3">visibility</i></a>				
				</td>
			</tr>			
        @endforeach
	</tbody>
</table>					

<div class="paginate center">
	{{ $profesores->render()}}
</div>