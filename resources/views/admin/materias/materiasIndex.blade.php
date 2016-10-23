@extends('layouts.app')
@section('title','Asignaturas')

@section('content')
	<h4 class="center">Asignaturas</h4>


	<div class="row">

		<div class="col s12 m12 l12">
			<div class="row">

			

			{!!Form::model(Request::all(),['route'=>'admin.materiasIndex.index','method'=>'GET'])!!}
				<div class="input-field col s5 l5 m4 fuentes" >
					
    				<select  name="programa">
      					

      					@foreach($programas as $programa);
      						<option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
      					@endforeach

      					
    				</select>
    				<label>Programa academico</label>
    				
  				</div>
				<div class="input-field col s3 l3 m3">
					
    				<select name="periodo">
      					

      					@foreach($periodos as $periodo);
      						<option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
      					@endforeach

      					
    				</select>
    				<label>Periodo Academico</label>
    				
  				</div>

  				<div class="input-field col s3 l3 m3">
  					<button type="submit" value="Aceptar">Aceptar</button>
  				</div>
  				
  				{!!Form::close()!!}
				
				
			</div>
<br>
<hr>
			<div class="row">
				<div class="col l12">
					<table>
						<thead class="responsive-table striped bordered">
							<th>Código</th>
							<th>Nombre</th>
							<th>Creditos</th>
							<th>Grupo</th>
							<th>Acciones</th>
						</thead>

						<tbody>
						@foreach($horarios as $horario)
							<tr>
								<td>
									
									{{$horario->Codigo}}
								</td>
								<td>
									{{$horario->Nombre}}
								</td>
								<td>
									{{$horario->Creditos}}
								</td>
								<td>
									
										{{$horario->Grupo}}
								</td>
								<td>
									<a class="btn-floating light-blue darken-2 tooltipped red right" data-position="bottom" data-delay="50" data-tooltip="Ver estudiantes"><i class="material-icons">visibility</i></a></li>

									<a class="btn-floating  green darken-2 tooltipped red right" data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons">work</i></a></li>

									<a class="btn-floating  tooltipped red right" data-position="bottom" data-delay="50" data-tooltip="Informes"><i class="material-icons ">picture_as_pdf</i></a></li>
									
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>

			<div class="">
				{!!$horarios->appends(Request::only(['periodo','programa']))->render()!!}
			</div>
	
		</div>

	</div>



@endsection