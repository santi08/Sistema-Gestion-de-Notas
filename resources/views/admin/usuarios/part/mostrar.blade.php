
 

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
          @foreach($users as $user)
          
          <tr>
             <td> {{ $user->firstname}} {{$user->secondname}} {{$user->lastname}}</td>
             <td> {{ $user->codigo }}</td>
             <td> {{ $user->email }}</td>
             <td>
             <a onClick="abrirModalEditar({{$user->id}})"  data-target='#editarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons">edit</i></a> 
             <a onClick="abrirModalEliminar({{$user->id}})" id="{{$user->id}}" data-target='#eliminarEstudiante' class="waves-effect waves-light btn-floating btn-small modal-trigger"><i class="material-icons red">delete</i></a>
             
             </td> 
          </tr>
          @endforeach

        </tbody>
      </table>

 {!! $users->render()!!}