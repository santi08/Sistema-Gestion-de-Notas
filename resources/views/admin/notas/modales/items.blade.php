@extends('layouts.modal')

@section('id')'insertarItem'
@overwrite

@section('contenido')
		
	<div class="row">

		<div class="col s12 m12 l12">
			<div class="row">
				<div class="col s12 m12 l12">
					<h4>Registrar Item</h4>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12">
					<h5>Asignatura:</h5><h5>{{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</h5>
				</div>
			</div>

			<div class="row">

				<div class="col s12 m12 l12">
					{!! Form::open(['route'=>['items.store'],'method' => 'POST', 'id'=> 'formItems'])!!}
						<div class="row">
							<div class="col s6 m6 l6">
								<label style="font-size: 1rem;">Nombre</label>
								<input type="text" id="nombre" name="nombre" required>
							</div>
							<div class="col s6 m6 l6">
								<select name="tipo_item" id="tipo_item" required>
									<option value="" disabled selected>Seleccione un tipo</option>
									  @foreach($tipo_items as $tipo);
				                            <option value="{{$tipo->id}}" id="{{$tipo->Id}}">{{$tipo->nombre}}
				                     </option>
				                        @endforeach        				                        
				        		</select>
				        		<label>Seleccionte un tipo</label>
							</div>
						</div>
						<div class="row">
							<div class="col s6 m6 l6">
								<label style="font-size: 1rem;">Porcentaje</label>
								<input type="number" step="any" id="porcentaje" min="0" max="100" name="porcentaje" required>
							</div>
							 <div class="input-field col s6 m6 l6">
					          <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
					          <label for="textarea1">Textarea</label>
					        </div>	
						</div> 					
							
						<div>
						<input type="hidden" id="horario" name="horario">	
						</div>

						
						<div class="row">
							<div class="col s4 m4 l4">
								<button class="waves-effect waves-light btn">Registrar</button>
							</div>
						</div>
						

				
					{!! Form::close()!!}
				</div>
			</div>

	
		
		</div>

	</div>
@overwrite		
