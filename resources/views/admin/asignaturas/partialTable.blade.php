 <table id="data-table-simple" class="responsive-table bordered display dataTable"  aria-describedby="data-table-simple_info">
    <thead >
        <th>Código</th>
        <th>Nombre</th>
        <th class="center">Creditos</th>
        <th class="center">Grupo</th>
        <th>Acciones</th>
    </thead>
    <tfoot>
    	<th>Código</th>
        <th>Nombre</th>
        <th class="center">Creditos</th>
        <th class="center">Grupo</th>
        <th>Acciones</th>
    </tfoot>
    <tbody>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                <td class="center">{{ $asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                <td class="center">{{ $asignatura->Grupo}}</td>
                <td>  
            	    <a href="{{route('admin.informes.pdfAsignatura',$asignatura->Id)}}" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons">picture_as_pdf</i></a>

                    <a data-target="#matricular" onclick=" return matricular({{ $asignatura->Id }});" class=" modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons green-text text-darken-1" >assignment_ind</i></a>

                    <a onclick="return ver({{$asignatura->Id}});" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosAsignaturas' data-tooltip="Ver"><i class="material-icons blue-text text-darken-3">visibility</i></a>
                 </td>                    
            </tr>
        @endforeach                    
	</tbody>
</table>




				
	

