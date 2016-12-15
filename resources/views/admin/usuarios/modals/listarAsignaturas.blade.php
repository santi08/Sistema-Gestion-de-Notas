@extends('layouts.modal')
@section('id')'listarAsignaturas'
@overwrite
@section('class')listarAsignaturas
@overwrite
@section('contenido')
<div class="row" >
    <div class="col s12 m12 l12">
      <div class="row">
          <fieldset class="grey lighten-4">
            <div class="input-field col s6 l3 m3">   
                <select name="periodos" id="periodos">
                    @foreach($periodos as $periodo);
                        <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
                    @endforeach
                </select>
                <label>Periodo Académico</label>
            </div>

            <div class="col s4 m4 l4 offset-l5 offset-m5 offset-s2" style="padding-top: 25px;">
                <a onclick="generarPdf()" class="waves-effect red-text text-darken-1 waves-light btn-flat "><i class="material-icons left red-text text-darken-1">picture_as_pdf</i>
                Generar reporte</a>
            </div>
          </fieldset>
      </div>
      <div class="row">
        <div class="col s12 m12 l12" id='divListarAsignaturas'>
    
        </div>
      </div>  

  </div>
</div>	
@overwrite 
@section('footer')

@overwrite