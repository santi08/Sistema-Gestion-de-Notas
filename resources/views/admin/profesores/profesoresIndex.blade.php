@extends('layouts.app')
@section('title','Profesores')

@section('content')
<br>
<div class="row">
	<div class="col s12 m12 l12">

		<div class="row">
	
			<div class="col s6 m6 l6">

				<div class="row">
					<div class="col s12 m12 l12 input-field card">
        				
        					<i class="material-icons prefix">search</i>
          					<input id="icon_prefix" type="search" class="validate">
          					<label for="icon_prefix">First Name</label>
      
        			</div>
        		</div>

			</div>

			<div class="col s6 m6 l6 ">

				<div class="row">
					<br>
					<div class="col s12 m12 l12 offset-l7">
						<!-- Dropdown Trigger -->
  						<a class='dropdown-button btn green darken-1' data-constrainwidth="false" href='#' data-activates='dropdown2'>Programas</a>

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

			</div>
		
		</div>

<hr>
	</div>
</div>

	<div class="row">
		<div class="col s12 m12 l12">

		<ul class="collapsible popout" data-collapsible="accordion">

			@foreach($profesores as $profesor)
				
				@if($profesor->Nombre == $profesor->Nombre)

					<li>
      					<div class="collapsible-header">{{$profesor->Nombre}} {{$profesor->Apellidos}}</div>
      					<div class="collapsible-body">
      						<table>
      							<thead>
      								<th>Programa</th>
      							</thead>
      							<tbody>
      								
      								@if($profesor->Nombre == $profesor->Nombre)
      									<tr>
      										<td>
      											{{$profesor->NombrePrograma}}
      										</td>
      									</tr>
      								@endif
      								
      								
      								
      							</tbody>
      						</table>
      					</div>
    				</li>

				@endif
					
				

			@endforeach
			
		</ul>
			
			<!--<table class="responsive-table striped bordered">
				<thead>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Programa</th>
					<th>Acciones</th>
				
				</thead>
				<tbody>
					@foreach($profesores as $profesor)
						<tr>

							<td>{{$profesor->Nombre}}</td>
							<td>{{$profesor->Apellidos}}</td>
							<td>{{$profesor->NombrePrograma}}</td>
							<td><a class="btn-floating tiny btn-small waves-effect waves-light  grey darken-2 right"><i class="material-icons">remove_red_eye</i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>-->
			<ul class="pagination">
				{{$profesores->links()}}
			</ul>

		</div>
	</div>
@endsection

 


         