<div class="col s12 m12 l12">
    <table class="responsive-table bordered" >
    <thead >
        <th>Código</th>
        <th>Nombre</th>
        <th class="center">Créditos</th>
        <th class="center">Grupo</th>
        <th>Profesor</th>
        <th class="center">Acciones</th>
    </thead>
    <tbody>
        @foreach ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                <td class="center">{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                <td class="center">{{$asignatura->horario->Grupo}}</td>
                <td>{{$asignatura->horario->usuario->Nombre}}{{$asignatura->horario->usuario->Apellidos}}</td>
                <td class="center"> 
                     <a onClick="" class="btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-target='#listarAsignaturas' data-tooltip="Ver Notas"><i class="material-icons blue-text text-darken-3">visibility</i></a>

                </td>                    
            </tr>
        @endforeach
                    
    </tbody>
</table>
</div>
