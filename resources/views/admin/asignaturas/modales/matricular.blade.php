
@extends('layouts.modal')

@section('id')'matricular'


@section('contenido')
		
	
			<div class="row">
				<div class="col s12 m12 l12">
					<h5>Matricular estudiante(s)</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m6 l6">
					<h6>Asignatura:</h6><h6 id="nombreAsignatura"></h6>
				
					<div class="row">
						<div class="col s12 m12 l12">
						<fieldset class="grey lighten-3">  
      					<legend data-toggle="collapse" style="cursor: pointer" >Matrícula Individual</legend>

      						@if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
							{!! Form::open(['route'=>['admin.matricular.estudiante'],'method' => 'POST', 'id'=> 'formEstudiante'])!!}
							@else
								{!! Form::open(['route'=>['docente.matricular.estudiante'],'method' => 'POST', 'id'=> 'formEstudiante'])!!}
							@endif
								<div class="row">
									<div class="col s12 m12 l12">
										<div class="input-field">
											<input type="text" id="codigo" name="codigo" class="autocomplete" required>
											<label for="codigo">Código del Estudiante</label>
										</div>	
									</div>
								</div>
								<input type="hidden" id="horario_estudiante" name="horario_estudiante">
								<div class="col s12 m6 l6 ">
									<button class="waves-effect waves-light btn teal darken-1 ">Matricular</button>
								</div>
						 
							{!! Form::close()!!}
							</fieldset>
						</div>
					</div>
				</div>

				<div class="col s12 m6 l6">
					<fieldset class="grey lighten-3">  
      					<legend data-toggle="collapse" style="cursor: pointer" class="" >Registrar por excel</legend>
					
						@if (Auth::guard('admin')->user()->rolCoordinador() || Auth::guard('admin')->user()->rolAdministrador())
								{!! Form::open(['route'=>['admin.matricular.archivo'],'method' => 'POST', 'id'=> 'formArchivo', 'files' => 'true'])!!}
						@else

						{!! Form::open(['route'=>['docente.matricular.archivo'],'method' => 'POST', 'id'=> 'formArchivo', 'files' => 'true'])!!}

						@endif
					 
						<input type="hidden" id="horario_archivo" name="horario_archivo">
						<div class="row">
							<div class="col s12 m12 l12">
								<div class="file-field input-field">
			      					<div class="btn blue-grey darken-1">
			        					<span>Elegir Archivo</span>
			        					<input type="file" name="file" id="file" required=""><i class=" mdi-editor-insert-drive-file left"></i>
			      					</div>
			      					<div class="file-path-wrapper">
			        					<input class="file-path validate" type="text">
			      					</div>
	    						</div>

	    						<div class="row">
	    							<div class="col s12 l8 m8  input-field">
				         				<button class="waves-effect waves-light btn teal darken-1" id="btn-matricular">Enviar  <i class="mdi-content-send right"></i></button>
				         			</div>
	    						</div>
	    					</div>
	    				</div>
	    					

	    			 
	    				{!! Form::close()!!}
					
				</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l8 m8  input-field">
				         				<button class="waves-effect waves-light btn teal darken-1" id="btn-salir">Salir  <i class="mdi-content-send right"></i></button>
				 </div>
			</div>

@endsection				
@overwrite