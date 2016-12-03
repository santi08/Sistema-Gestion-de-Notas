<div class="col s12 l12 m12">
      <div class="row">
        <div class="col s12 m12 l12">
          <h5 id="nombreEstudiante" class="center gradient darken-3 white-text" id="nombreMateria">{{$nombre}}</h5>
        </div>

      </div>
</div>
 
<div class="row">
<div class="col s12 l12 m12">
<table class="responsive-table striped bordered">
  	  <thead>
  	  	<tr>
  	  	 <th>codigo</th>
  	  	 <th>Asignatura</th>
  	  	 <th>creditos</th>
  	  	 <th>profesor</th>
  	  	 <th>Acciones</th>
   	  	</tr>

  	  </thead>
  	  <tbody>
  	  @foreach($asignaturasUltimoPeriodo as $asignatura)
  	  	<tr>
  	  		<td>{{$asignatura->horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
  	  		<td>{{$asignatura->horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
  	  		<td>{{$asignatura->horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
  	  		<td>{{$asignatura->horario->usuario->Nombre}} {{$asignatura->horario->usuario->Apellidos}}</td>
          <td><a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons">picture_as_pdf</i></a></td>
  	  	</tr>
  	  @endforeach	
  	  </tbody>
</table>

</div>
</div>