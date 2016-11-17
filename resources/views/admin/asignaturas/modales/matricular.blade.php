
@extends('layouts.modal')

@section('id')'matricular'
@overwrite

@section('contenido')
		
	<div class="row">

		<div class="col s12 m12 l12">
			<div class="row">
				<div class="col s12 m12 l12">
					<h4>Matricular estudiante(s)</h4>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12">
					<h5>Asignatura:</h5><h5 id="nombreAsignatura"></h5>
				</div>
			</div>

			<div class="row">

				<div class="col s12 m12 l12">
					{!! Form::open(['route'=>['matricular.estudiante'],'method' => 'POST', 'id'=> 'formEstudiante'])!!}
						<div class="row">
							<div class="col s6 m6 l6">
								<label style="font-size: 1rem;">Codigo de estudiante</label>
								<input type="text" id="codigo" name="codigo" class="autocomplete">
							</div>
						</div>
						<input type="hidden" id="horario_estudiante" name="horario_estudiante">
						<div class="row">
							<div class="col s4 m4 l4 offset-l8">
								<button class="waves-effect waves-light btn">Matricular</button>
							</div>
						</div> 

				
					{!! Form::close()!!}
				</div>
			</div>

	
			<div class="row">
				<fieldset class="green lighten-5">  
      				<legend data-toggle="collapse" style="cursor: pointer" class="" >Registrar por excel</legend>
					
					<div class="col s12 m12 l12">
					 	{!! Form::open(['route'=>['matricular.archivo'],'method' => 'POST', 'id'=> 'formArchivo', 'files' => 'true'])!!}
						
						<div class="row">
							<div class="col s12 m12 l12">
								<div class="file-field input-field">
			      					<div class="btn">
			        					<span>Elegir Archivo</span>
			        					<input type="file" name="file" id="file" required>
			      					</div>
			      					<div class="file-path-wrapper">
			        					<input class="file-path validate" type="text">
			      					</div>
	    						</div>
	    					</div>
	    				</div>
	    					<input type="hidden" id="horario_archivo" name="horario_archivo">

	    				<div class="row">
				         	<div class="col s4 l4 m4 offset-l8 offset-s8 input-field">
				         		<button class="green btn" id="btn-matricular"><i class="material-icons left">save</i>Matricular</button>
				         	</div>
				        </div> 
	    				{!! Form::close()!!}
					</div>
				</fieldset>
			</div>
		</div>

	</div>				
@overwrite