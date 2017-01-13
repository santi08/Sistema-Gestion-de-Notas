@extends('layouts.modal')
@section('id')'modificarContrasena'
@overwrite
@section('class')bottom-sheet
     
@overwrite

@section('contenido')
<H4> MODIFICAR CONTRASEÑA</H4>
      <div class="col-md-12">
        <div class="row">
            {!! Form::open(['route'=>'estudiante.modificarContrasena','method'=>'POST', 'id'=>'modificarContraseña']) !!}
                {!! Form::hidden('id',Auth::user()->id) !!}
                <div class="input-field">
                    <label class="control-label">Contraseña antigua</label>
                    <input class="input-field required" name="contrasenaAntigua" type="password">
                </div>
                <div class="input-field ">
                    <label class="control-label">Nueva contraseña</label>
                    <input minlength="5" class="input-field required" name="contrasena" type="password">
                </div>
                <div class="input-field">
                    <label class="control-label">Confirmar nueva contraseña </label>
                    <input minlength="5"  class="input-field required" name="contrasenaNueva" type="password">
                </div>
            <br>
                <button type="submit" class="green btn red btn-primary"><i class="material-icons left">edit</i>Modificar</button>
            {!! Form::close() !!}
        </div>

    </div>

@overwrite
