@extends('layouts.app')
@section('title','Profesores')

@section('content')
<br>
<div class="row">
	<div class="col s12 m12 l12">

		<div class="row">
	
			<div class="col s6 m6 l6">

				<div class="row">
					<div class="col s12 m12 l12 input-field ">
        				
        					<i class="material-icons prefix">search</i>
          					<input id="icon_prefix" type="search" class="validate" >
          					<label for="icon_prefix">Buscar</label>
      
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

		
			
			<!--<table class="responsive-table striped bordered">
				<thead>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Programa</th>
					<th>Acciones</th>
				
				</thead>
				<tbody>
					
				</tbody>
			</table>-->
			<ul class="pagination">
				
			</ul>

		</div>
	</div>
@endsection

 


         