@extends('layouts.modal')
@section('id')'verPerfil'
@overwrite
@section('class')center-sheet   
@overwrite

@section('contenido')
<div style="color: red">
        <center><h4>{{Auth::user()->primerNombre }} {{Auth::user()->segundoNombre}} {{Auth::user()->primerApellido }}</h4></center>
 </div>

<div class="row">
    <div class="col m12 s12 l12">
        <h5>Datos personales</h5>
            <div class="row">
                {!! Form::open(['route'=>'estudiante.modificarCorreo','method'=>'POST']) !!}
                {!! Form::hidden('id',Auth::user()->id) !!}
                <div class="col m12 l12 s12">
                    <div class="row">
                        <div class="col s5 m6 l6">
                            <div class="input-field">
                                <label for="primerNombre">Primer nombre</label>
                                <input disabled value="{{Auth::user()->primerNombre}}" name="primerNombre" type="text">
                            </div>
                        </div>

                        <div class="col s6 m6 l6">
                            <div class="input-field">
                                <label for="segundoNombre">Segundo nombre</label>
                                <input disabled value="{{Auth::user()->segundoNombre}}" class="disabled" name="segundoNombre" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6 m6 l6">
                            <div class="input-field">
                                <label for="primerApellido">Primer apellido</label>
                                <input disabled value="{{Auth::user()->primerApellido}}" name="primerApellido" type="text">
                            </div>
                        </div>

                        <div class="col s6 m6 l6">
                            <div class="input-field">
                                <label for="segundoApellido" >Segundo apellido</label>
                                    <input disabled class="disabled" value="{{Auth::user()->segundoApellido}}" name="segundoApellido" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m7 l7 s7">                            
                            <div class="input-field">
                                <label for="email">Email</label>
                                <input value="{{Auth::user()->email}}" class="disabled" name="email" type="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <button id="botoneditar"  type="submit" class="green btn  "><i class="material-icons left">edit</i>Modificar Correo</button>
                        
                    </div>    
            </div>
            {!! Form::close() !!}
               
        </div>
            
    </div>
</div>

@overwrite

