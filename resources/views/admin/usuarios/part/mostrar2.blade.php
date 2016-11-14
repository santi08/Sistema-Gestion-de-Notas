
 

 	<table class="col highlight responsive-table bordered">
        <thead>
          <tr>
              <th data-field="id">Nombre Completo</th>
              <th data-field="name">codigo</th>
              <th data-field="email">correo</th>
              <th data-field="accion">Acciones</th>
          </tr>
        </thead>

        <tbody>
          @foreach($e as $estudiante)
          
          <tr>
             <td> {{ $estudiante->primerNombre}} {{$estudiante->segundoNombre}} {{$estudiante->primerApellido}}</td>
             <td> {{ $estudiante->codigo }}</td>
             <td> {{ $estudiante->email }}</td>
             <td>
             <a onClick="abrirModalEditar({{$estudiante->id}})"  data-target='#editarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons">edit</i></a> 
             <a onClick="abrirModalEliminar({{$estudiante->id}})" id="{{$estudiante->id}}" data-target='#eliminarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons red">delete</i></a>
             
             </td> 
          </tr>
          @endforeach

        </tbody>
      </table>

 {!! $e->render()!!}