@extends('layouts.app')
@section('title','Mis Asignaturas')

@section('content')

<h4 class="center">Mis Asignaturas</h4>
<br>

<div class="row">
   <div class="col s12 m12 l12">
     
      <div class="row">
            <div class="col s12 m12 l12">
               <fieldset class="grey lighten-4">
                   <div class="row">
                  <div class="input-field col s12 l3 m3">
                     <select name="periodos" id="periodos">
                        @foreach($periodos as $periodo);
                           <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano."-".$periodo->Periodo}}</option>
                        @endforeach
                     </select>
                     <label>Periodo Academico</label>
                    
                  </div>
               </div>
               </fieldset>
              
            </div>      
         </div>
<br>
<div class="divider  grey darken-1"></div>
<br>
         <div class="row" id="asignaturas">

            <div class="col s12 m12 l12">
               <table class="responsive-table bordered" > 
               <thead >
                  <th>Código</th>
                  <th>Nombre</th>
                  <th class="center">Créditos</th>
                  <th class="center">Grupo</th>
                  <th>Profesor</th>
                  <th class="center">Acciones</th>
               </thead>
               <tbody>

                  @foreach ($asignaturas as $asignatura)
                     <tr>
                        <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                        <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                        <td class="center">{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                        <td class="center">{{$asignatura->horario->Grupo}}</td>
                        <td>{{$asignatura->horario->usuario->Nombre}} {{$asignatura->horario->usuario->Apellidos}}</td>
                        <td class="center"> 

                               <a onClick="" class="btn-flat modal-trigger tooltipped" data-position="bottom" data-delay="50" data-target='#listarAsignaturas' data-tooltip="Ver Notas"><i class="material-icons blue-text text-darken-3">visibility</i></a>


                        </td>                    
                     </tr>
                  @endforeach
                    
               </tbody>
            </table>
            </div>
            
         </div>
   </div>
</div>
         
		
@endsection

@section('scripts')
<script type="text/javascript">
//abrir selector
	$(document).ready(function(){
     $('#periodos').material_select();
	});
//capturas id periodo


$('#periodos').change(function (){
    var idPeriodo =$('#periodos').val();
    var ruta = "{{route('admin.usuarios.asignaturasEstudiante')}}";

    $.ajax({
    url: ruta,
    type:'GET',
    dataType:'json',
    data:{idPeriodo:idPeriodo},
    success:function(res){
      console.log(res);
      $('#asignaturas').html(res);
       $('.tooltipped').tooltip({delay: 50});
    },error: function(error){
       console.log(error);
             }
    });
})

</script>
@endsection