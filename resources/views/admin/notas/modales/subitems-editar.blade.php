@extends('layouts.modal')

@section('id')'EditarSubitem'
@overwrite

@section('contenido')
		

			<div class="row">
				<div class="col s6 m6 l6">
					<h5>Editar Subitem <strong><span id="nombreItem"></span></strong></h5>
				</div>

				<div class="col s6 m6 l6">
					<h5>Porcentaje disponible: <span id="nombre_item" name="nombre_item"><span</h5>
				</div>
			</div>

			<div class="row">

				<div class="col s12 m12 l12">
					{!! Form::open(['route'=>['subitem.edit'],'method' => 'POST'])!!}
						<div class="row">
							<div class="col s6 m6 l6 input-field">
								
								<input type="text" id="nombre_subitem" name="nombre_subitem" required placeholder="">
								<label for="nombre">Nombre</label>
							</div>

							<div class="col s4 m4 l4 input-field">
								
								<input type="number" step="any" id="porcentaje" min="0" max="100" name="porcentaje" placeholder="">
								<label for="porcentaje">Porcentaje</label>
							</div>
						</div>

						<div class="row">
							
							 <div class="input-field col s12 m12 l12">
					          <textarea id="descripcion" name="descripcion" placeholder="" class="materialize-textarea" rows="4" cols="50"></textarea>
					          <label for="textarea1">Descripción(Opcional)</label>
					        </div>	
						</div> 					
							
						<div>
						<input type="hidden" id="id_subitem" name="id_subitem">	
						</div>

						
						<div class="row">
							<div class="col s12 m12 l12">
								<button style="width: 100%" class="waves-effect waves-light btn  teal lighten-2">Guardar</button>
							</div>
						</div>
						

				
					{!! Form::close()!!}
				</div>
			</div>
@overwrite

				
