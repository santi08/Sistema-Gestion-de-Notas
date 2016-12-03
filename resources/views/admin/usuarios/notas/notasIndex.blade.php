@extends('layouts.app')

@section('title','Notas')

@section('content')

	<div class="row">
		<div class="col s11 m11 l11">
			<h4 class="center">Registro de notas</h4>
			
		</div>

		<div class="col s1 m1 l1 ">
			<a href="{{route('admin.materiasIndex.index')}}" class="btn-floating  tooltipped large waves-effect waves-red green darken-2" data-position="bottom" data-delay="50" data-tooltip="Atras" style="margin-top: 1em;"><i class="material-icons">keyboard_backspace</i></a>
		</div>
	</div>
	<hr>

	<div class="row">
		<div class="col s1 m1 l1 offset-l11">
			
		</div>
	</div>
	


@endsection