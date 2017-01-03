@extends('layouts.modal')

@section('id')'insertarSubitem'
@overwrite

@section('contenido')
		

			<div class="row">
				<div class="col s6 m6 l6">
					<h5>Registrar SubItem a: <strong><h4 id="nombreItem"></h4></strong></h5>
				</div>

				<div class="col s6 m6 l6">
					<h5>Porcentaje disponible: <span id="nombre_item" name="nombre_item"><span</h5>
				</div>
			</div>

			<div class="row">

				<div class="col s12 m12 l12">
					{!! Form::open(['route'=>['subitems.store'],'method' => 'POST', 'id'=> 'formSubitems'])!!}
						<div class="row">
							<div class="col s6 m6 l6 input-field">
								
								<input type="text" id="nombre" name="nombre" required>
								<label for="nombre">Nombre</label>
							</div>

							<div class="col s4 m4 l4 input-field">
								
								<input type="number" step="any" id="porcentaje" min="0" max="100" name="porcentaje">
								<label for="porcentaje">Porcentaje</label>
							</div>
						</div>

						<div class="row">
							
							 <div class="input-field col s12 m12 l12">
					          <textarea id="descripcion" name="descripcion" class="materialize-textarea" rows="4" cols="50"></textarea>
					          <label for="textarea1">Descripción(Opcional)</label>
					        </div>	
						</div> 					
							
						<div>
						<input type="hidden" id="id_item" name="id_item">	
						</div>

						
						<div class="row">
							<div class="col s12 m12 l12">
								<button style="width: 100%" class="waves-effect waves-light btn  green lighten-2 "><i class=" mdi-content-save"></i> Guardar</button>
							</div>
						</div>
						

				
					{!! Form::close()!!}
				</div>
			</div>
@overwrite

				
