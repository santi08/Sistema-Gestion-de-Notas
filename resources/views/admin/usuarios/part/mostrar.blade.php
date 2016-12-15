<table id="data-table-estudiante" class="col highlight responsive-table  bordered display dataTable"  aria-describedby="data-table-simple_info">
   <thead>
      <tr>
         <th data-field="name">Código</th>
         <th data-field="id">Nombre Completo</th>
         <th data-field="email">Correo</th>
         <th data-field="programa">Programa</th>
         <th data-field="accion">Acciones</th>
      </tr>
   </thead>
   <tfoot>
      <tr>
         <th data-field="name">Código</th>
         <th data-field="id">Nombre Completo</th>
         <th data-field="email">Correo</th>
         <th data-field="programa">Programa</th>
         <th data-field="accion">Acciones</th>
      </tr>
   </tfoot>

   <tbody>
      @foreach($estudiantes as $estudiante)    
         <tr>
            <td> {{ $estudiante->codigo }}</td>
            <td> {{ $estudiante->primerNombre}} {{$estudiante->segundoNombre}} {{$estudiante->primerApellido}}</td>
            <td> {{ $estudiante->email }}</td>
             <td>{!! $resultado = str_replace("TECNOLOGIA", "TEC.", $estudiante->programaAcademico->NombrePrograma); !!}</td>
            <td>
               <a onClick="abrirModalEditar({{$estudiante->id}})"  data-target='#editarEstudiante' class="btn-flat modal-trigger"><i class="material-icons orange-text text-darken-1">edit</i></a> 
             
               <a onclick="eliminar({{$estudiante->id}});" id="{{$estudiante->id}}" data-target='#eliminarEstudiante' class="btn-flat "><i class="material-icons red-text">delete</i></a>
             
               <a onClick="listarAsignaturas({{$estudiante->id}})" class="btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-target='#listarAsignaturas' data-tooltip="asignaturas"><i class="material-icons blue-text text-darken-3">visibility</i></a> 
            </td> 
         </tr>
      @endforeach

   </tbody>
</table>

