@extends('layouts.modal')
@section('id')'verPerfil'
@overwrite
@section('class')bottom-sheet  
@overwrite

@section('contenido')
<div style="color: red">
        <CENTER><h4>{{Auth::user()->primerNombre }} {{Auth::user()->segundoNombre}} {{Auth::user()->primerApellido }}</h4></CENTER>
 </div>
	<div class="col m6 s6 l6">
            <h1>Datos personales</h1>
            <div class="row">
                    {!! Form::open(['route'=>'estudiante.modificarCorreo','method'=>'POST']) !!}
                    {!! Form::hidden('id',Auth::user()->id) !!}
                <div class="col m4 l4 s4">
                    <div >
                        <label for="primerNombre">Primer nombre</label>
                        <input disabled value="{{Auth::user()->primerNombre}}" name="primerNombre" type="text">
                    </div>
                    <div >
                        <label for="primerApellido">Primer apellido</label>
                        <input disabled value="{{Auth::user()->primerApellido}}" name="primerApellido" type="text">
                    </div>
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input value="{{Auth::user()->email}}" class="floatl__input  required" name="email" type="email">
                    </div>

                </div>
                <div class="col m4 l4 s4">
                    <div >
                        <label for="segundoNombre">Segundo nombre</label>
                        <input disabled value="{{Auth::user()->segundoNombre}}" class="floatl__input form-control" name="segundoNombre" type="text">
                    </div>
                    <div >
                        <label for="segundoApellido" >Segundo apellido</label>
                        <input disabled class="floatl__input form-control" value="{{Auth::user()->segundoApellido}}" name="segundoApellido" type="text">
                    </div>

                </div>
            </div>
            <div class="row">
                <button id="botoneditar"  type="submit" class="green btn red btn-primary"><i class="material-icons left">edit</i>Modificar Correo</button>
                {!! Form::close() !!}
            </div>

    </div>

@overwrite

