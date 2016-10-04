@extends('layouts.app')
@section('title','Profesores')

@section('content')
	<div class="row">
		<div class="col s6 m6 l6">
			<form>
        		<div class="input-field">
          			<input id="search" type="search" required>
          			<label for="search"><i class="material-icons">search</i></label>
          			<i class="material-icons">close</i>
        		</div>
      		</form>
		</div>
		<div class="col s6 m6 l6">
			<!-- Dropdown Trigger -->
  			<a class='dropdown-button btn' href='#' data-activates='dropdown2'>Drop Me!</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="#!" >Tecnologia en Sistemas</a></li>
    <li class="divider"></li>
    <li><a href="#!">Tecnologia Quimica</a></li>
    <li class="divider"></li>
    <li><a href="#!">Tecnologia en Electrónica</a></li>
  </ul>
        
		</div>
		
	</div>

	<div>
		<table class="responsive-table striped">
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Programa</th>
				<th>asignatura</th>
				
			</thead>
			<tbody>
				@foreach($profesores as $profesor)
					<tr>

						<td>{{$profesor->Nombre}}</td>
						<td>{{$profesor->Apellidos}}</td>
						<td>{{$profesor->NombrePrograma}}</td>
						<td>{{$profesor->Asignatura}}</td>
					</tr>
					

				@endforeach
				
			</tbody>

		</table>
			<ul class="pagination">
			{{$profesores->links()}}
			</ul>

	</div>
		
	
	
	

@endsection

 


         