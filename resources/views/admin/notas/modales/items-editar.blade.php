@extends('layouts.modal')


@section('id')'EditarItem'
@overwrite

@section('contenido')	

	<div class="row">
		<div class="col s12 m12 l12">
			<h5>Asignatura: {{$asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</h5>
			<h6>Porcentaje disponible: {{$porcentajeDisponible}}%</h6>
		</div>
	</div>

	<div class="row">
		<div class="col s12 m12 l12">
			{!! Form::open(['route'=>['item.edit'],'method' => 'POST'])!!}
				<div class="row">
					<div class="col s6 m6 l6 input-field">
						
						<input type="text" id="nombre_item" name="nombre_item" required placeholder="">
						<label for="nombre">Nombre</label>

					</div>
					
					<div class="col s6 m6 l6 input-field">
						<select name="tipo_item" id="tipo_item" required="required" class="browser-default">
							<option value="" disabled selected>Seleccione un tipo</option>
							@foreach($tipo_items as $tipo);
				                <option value="{{$tipo->id}}" id="{{$tipo->Id}}">{{$tipo->nombre}}</option>
				            @endforeach        				                        
				        </select>
				     	
					</div>
				</div>
				
				<div class="row">
					<div class="col s6 m6 l6 input-field" id="div-porcentaje">
						<input type="number" step="any" id="porcentaje" min="0" max="100" name="porcentaje" required placeholder="">
						<label for="porcentaje">Porcentaje</label>
					</div>
					
					<div class="input-field col s6 m6 l6">
					    <textarea id="descripcion" name="descripcion" class="materialize-textarea" rows="4" cols="50" placeholder=""></textarea>
					    <label for="textarea1">Descripción (Opcional) </label>
					</div>	
				</div> 					
							
				<div>
					<input type="hidden" id="id_item" name="id_item">	
				</div>

					
				<div class="row">
					<div class="col s12 m12 l12">
						<button class="waves-effect waves-light btn green lighten-2" style="width: 100%" id="btn-editar-item" onclick="loading('EditarItem')"><i class=" mdi-content-save"></i>Guardar</button>
					</div>
				</div>
					
			{!! Form::close()!!}
		</div>
	</div>
@overwrite



