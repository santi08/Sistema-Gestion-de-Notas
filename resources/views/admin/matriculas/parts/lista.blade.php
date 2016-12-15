<table class="responsive-table  bordered" id="asignaturas">
    <thead >
        <th>Código</th>
        <th>Nombre</th>
        <th class="center">Créditos</th>
        <th class="center">Grupo</th>
        <th class="center">Acciones</th>
    </thead>
    <tbody>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                <td class="center">{{ $asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                <td class="center">{{ $asignatura->Grupo}}</td>
                <td class="center"> 
                    @if (count($asignatura->matriculas)>0)
                        <a a href="{{route('notas.index', $asignatura->Id)}}" class="btn-flat  modal-trigger tooltipped " data-position="bottom" data-delay="50" data-tooltip="Gestionar Notas" ><i class="material-icons cyan-text text-darken-1">assignment</i></a>
                    @endif        
                        <a data-target="#matricular" onclick="matricular({{ $asignatura->Id}})" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons green-text text-darken-1" >assignment_ind</i></a>
                     @if (count($asignatura->matriculas)>0)    
                         <a href="{{route('admin.informes.pdfAsignatura',[$asignatura->Id])}}" target="_blank" class="btn-floating btn-small waves-effect waves-light red btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">
                        picture_as_pdf</i></a
                    @endif 
                </td>                    
            </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $('.pdf').dropdown('open');
    $('.tooltipped').tooltip({delay: 50});
</script>
