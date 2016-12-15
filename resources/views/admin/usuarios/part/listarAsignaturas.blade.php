

<div class="row">
   <div class="">
      <h5 id="nombreEstudiante" class="center gradient darken-3 white-text" id="nombreMateria">{{$nombre}} </h5>
      <input type="hidden" id="idEstudiantehidden"  value="{{$estudiante->id}}">

   </div>
</div>
<div class="row">
   <div class="">
      <table class="responsive-table bordered">
  	      <thead>
  	  	      <tr>
  	  	         <th>Código</th>
  	  	         <th>Asignatura</th>
  	  	         <th>Créditos</th>
  	  	         <th>Profesor</th>
            </tr>
  	      </thead>
  	      <tbody>
  	         @foreach($asignaturas as $asignatura)
  	  	         <tr>
  	               <td>{{$asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
  	               <td>{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
  	               <td>{{$asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                  <td>{{$asignatura->usuario->Nombre}} {{$asignatura->usuario->Apellidos}}</td>
  	  	         </tr>
  	         @endforeach	
  	      </tbody>
      </table>
   </div>
</div>
