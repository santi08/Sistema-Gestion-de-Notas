@extends('layouts.modal')
@section('id')'modificarContrasena'
@overwrite
@section('class')bottom-sheet
     
@overwrite

@section('contenido')
<h5> MODIFICAR CONTRASEÑA</h5>
      <div class="row">
        <div class="col s12 m12 l12">
            {!! Form::open(['route'=>'estudiante.modificarContrasena','method'=>'POST', 'id'=>'modificarContraseña']) !!}
                {!! Form::hidden('id',Auth::user()->id) !!}
                <div class="row">
                    <div class="col s12 m12 l12">
                         <div class="input-field">
                            <input class="validate" id="contrasenaAntigua" required="" name="contrasenaAntigua" type="password">
                            <label for="contrasenaAntigua">Contraseña antigua</label>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field ">
                    
                            <input minlength="5" id="contrasena" required="" class="input-field required" name="contrasena" type="password">
                            <label for="contrasena">Nueva contraseña</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="input-field">
                            
                            <input minlength="5" id="contrasenaNueva" required="" class="input-field required" name="contrasenaNueva" type="password">
                            <label for="contrasenaNueva">Confirmar nueva contraseña </label>
                        </div>
                    </div>
                </div>
               
                
                
            <br>
                <button type="submit" style="width: 100%" class="green btn red"><i class="material-icons left">edit</i>Modificar</button>
            {!! Form::close() !!}
        </div>

    </div>

@overwrite
