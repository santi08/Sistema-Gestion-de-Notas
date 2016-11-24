<table class="responsive-table striped bordered" >
    <thead >
        <th>Código</th>
        <th>Nombre</th>
        <th>Creditos</th>
        <th>Grupo</th>
        <th>Profesor</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                <td>{{$asignatura->horario->Grupo}}</td>
                <td>{{$asignatura->horario->usuario->Nombre}}{{$asignatura->horario->usuario->Apellidos}}</td>
                <td> 
                   	 <a onClick="" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-target='#listarAsignaturas' data-tooltip="Ver Notas"><i class="material-icons">visibility</i></a>

                </td>                    
            </tr>
        @endforeach
                    
    </tbody>
</table>