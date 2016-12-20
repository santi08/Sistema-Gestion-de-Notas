@extends('layouts.app')

@section('title','Bienvenido')



@section('content')

    <h3>Bienvenido(a) al Sistema de Control Académico Universitario</h3>

    <div class="row">
		<div class="col s12 m12 l12">
			<a class="waves-effect blue darken-1 btn" href="{{ asset('manual.pdf') }}" target="_blank"><i class="material-icons left">live_help</i>Manual del Usuario</a>
		</div>    	
    </div>
@endsection
