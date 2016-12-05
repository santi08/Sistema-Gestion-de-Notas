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
                        <a a href="{{route('notas.index', $asignatura->Id)}}" class="btn-flat  modal-trigger tooltipped " data-position="bottom" data-delay="50" data-tooltip="Gestionar Notas" ><i class="material-icons green-text">assignment</i></a>
                    @endif        
                        <a data-target="#matricular" onclick="matricular({{ $asignatura->Id}})" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons blue-text" >assignment_ind</i></a>

                        <a href="#" class="btn-flat modal-trigger  tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons red-text">picture_as_pdf</i></a>
                </td>                    
            </tr>
        @endforeach
    </tbody>
</table>
