@extends('layouts.app')
@section('title','Profesores')

@section('content')
<br>
<div class="row">
	<div class="col s12 m12 l12">

			<div class="row">

			<div class="input-fiel col s6">
					<label>Periodo Academico</label>		
				<select>
					<option value="" disabled selected>Seleccione una opción</option>
					@foreach($PeriodosAcademicos as $PeriodoAcademico)
						  			
				    <option value="{{ $PeriodoAcademico->Id}}">
				    {{ $PeriodoAcademico->Ano}} - {{ $PeriodoAcademico->Periodo }}
				    </option>

					@endforeach
						  			
				</select>
					  	
			</div>	
			

			
					<div class="input-fiel col s6">
						<label>Programa Academico</label>
						<select>
							<option value="" disabled selected>Seleccione una opción</option>

							@foreach($ProgramasAcademicos as $ProgramaAcademico)
								@if($ProgramaAcademico->NombrePrograma != 'GENERICO')
									<option value="{{$ProgramaAcademico->id}}">		
									
									{{ $ProgramaAcademico->NombrePrograma }}
								</option>
								@endif
							@endforeach
						
						</select>
						
						  			
					</div>
  				

			
		
		</div>
		<div class="row">
	
			<div class="col s4 m3 l4">

				<div class="row">
					<div class="col s12 m12 l12 input-field ">
        				
        					<i class="material-icons prefix">search</i>
          					<input id="icon_prefix" type="search" class="validate" >
          					<label for="icon_prefix">Buscar</label>
      
        			</div>
        		</div>

			</div>
		</div>


		

	<hr>
	</div>
</div>
<div class="row">
	<div class="col s3">Nombres</div>
	<div class="col s3">Apellidos</div>
	<div class="col s3">Programa</div>
	<div class="col s3">Acciones</div>

</div>

	<div class="row">
		
					
				@foreach($profesores as $profesor)
				<ul class="collapsible" data-collapsible="accordion">			
		    		<li>
		    			<div class="collapsible-header col s12">
		    				
		    				
		    				
		      									      								
		      			</div>
		      							
		      			<div class="collapsible-body  grey lighten-3 col s12">
		      				<p>
		      					
		      				</p>
		      			</div>
		    		</li>
		   
		  						
								
									<!--<tr>
										<td></td>
										<td></td>
										<td></td>
										<td>

										<a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

										<a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
											
										</td>

									</tr>
								-->
					</ul>
				@endforeach
			

	</div>

	<table class="striped">
		<thead>
			<tr>
				<th>Apellidos</th>
				<th>Nombre</th>
				<th>Programa</th>
				<th>Acciones</th>

			</tr>
		</thead>

		<tbody>
		@foreach($profesores as $profesor)
				<tr>
					<td>{{$profesor->Apellidos}}</td>
					<td>{{$profesor->Nombre}}</td>
					<td>{{ $profesor->NombrePrograma}}</td>
					<td>
						<a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons">picture_as_pdf</i></a>

						<a href="#" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Ver"><i class="material-icons">visibility</i></a>
					</td>
				</tr>
		@endforeach
		</tbody>
	</table>
						
						

			<div class="paginate">
				{{ $profesores->links()}}

			</div>

		</div>
	</div>



@endsection

 


         