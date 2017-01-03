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
                  <div class="col s4 m4 l4 offset-l5 offset-m5 offset-s2" style="padding-top: 25px;">
                    <a onclick="generarPdf({{Auth::user()->id}})" class="waves-effect red-text text-darken-1 waves-light btn-flat "><i class="material-icons left red-text text-darken-1">picture_as_pdf</i>
                    Generar reporte</a>
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
                  
               </thead>
               <tbody>

                  @foreach ($asignaturas as $asignatura)
                     <tr>
                        <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                        <td>{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                        <td class="center">{{ $asignatura->horario->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                        <td class="center">{{$asignatura->horario->Grupo}}</td>
                        <td>{{$asignatura->horario->usuario->Nombre}} {{$asignatura->horario->usuario->Apellidos}}</td>                    
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

function generarPdf(idEstudiante){
    idPeriodo=$('#periodos').val();
    var url="{{route('admin.informes.pdfEstudiante',['id','idPeriodo'])}}"
    url=url.replace('id',idEstudiante);
    url=url.replace('idPeriodo',idPeriodo);

    window.open(url);
   }

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