
@extends('layouts.modal')

@section('id')'matricular'
@overwrite

@section('contenido')
		
	<div class="row">

		<div class="col s6 m6 l12">
			<div class="row">
				<div class="col s6 m6 l12">
					<h4>Matricular estudiante(s)</h4>
				</div>
			</div>

			<div class="row">
				<div class="col s6 m6 l12">
					<h5>Asignatura:</h5><h5 id="nombreAsignatura"></h5>
				</div>
			</div>



			<div class="row">
				<div class="col s6 m6 l6">
				{!! Form::open(['route'=>['matricular.estudiante'],'method' => 'POST', 'id'=> 'formEstudiante'])!!}
					<label style="font-size: 1rem;">Codigo de estudiante</label>
					<input type="text" id="codigo" name="codigo" class="autocomplete">
					 {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Enter name'])}}
					<button class="waves-effect waves-light btn">Matricular</button>
					<input type="hidden" id="horario" name="horario">
				
				{!! Form::close()!!}
				
				</div>
			</div>

			

<div class="divider"></div>

			<div class="row">
				<div class="col s6 m6 l6">	
					
					 {!! Form::open(['route'=>['matricular.archivo'],'method' => 'POST', 'id'=> 'formArchivo', 'files' => 'true'])!!}
					

						<label style="font-size: 1rem;">Registrar por archivo</label>
						<div class="file-field input-field">
			      			<div class="btn">
			        			<span>seleccione un archivo</span>
			        			<input type="file" name="file" required>
			      			</div>
			      			<div class="file-path-wrapper">
			        			<input class="file-path validate" type="text">
			      			</div>
	    				</div>
	    				<input type="hidden" id="horario" name="horario">
	    				<div class="row">
				          <div class="col s5 l5 m5 offset-l6 offset-s6 input-field">
				           
				           <button class="green btn" id="btn-matricular"><i class="material-icons left">save</i>Matricular
				           </button>
				           
				          </div>
				        </div> 

				         

	    				{!! Form::close()!!}
				
				</div>
				</div>
			</div>

		</div>
	
			

			
		
			
@overwrite