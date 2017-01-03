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
            	    


                    <a data-target="#matricular" onclick=" return matricular({{ $asignatura->Id }});" 
                    class=" modal-trigger btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="mdi-action-assignment-ind green-text text-darken-1" ></i></a>
  
                    <a onclick="return ver({{$asignatura->Id}});" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosAsignaturas' data-tooltip="Ver"><i class="mdi-action-visibility blue-text text-darken-3"></i></a>

                    @if(Auth::guard('admin')->user()->rolDocente())
                        @if (count($asignatura->matriculas)>0)
 

                            <a href="{{route('docente.informes.pdfAsignatura',[$asignatura->Id])}}" target="_blank" class="btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons red-text">
                            picture_as_pdf</i></a>
                        @endif
                    @else
                        @if (count($asignatura->matriculas)>0)    
                            <a href="{{route('admin.informes.pdfAsignatura',[$asignatura->Id])}}" target="_blank" class="btn-flat tooltipped " data-position="bottom" data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons red-text">
                            picture_as_pdf</i></a>
                        @endif
                    @endif     

                 </td>                    
            </tr>
        @endforeach                    
	</tbody>
</table>

<script type="text/javascript">
    $('#pdfAsignatura').dropdown('open');
    $('.tooltipped').tooltip({delay: 50});
</script>



				
	

