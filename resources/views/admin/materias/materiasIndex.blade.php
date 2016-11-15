@extends('layouts.app')
@section('title','Asignaturas')

@section('content')
	<h4 class="center">Asignaturas</h4>
    <br>
    <div class="row">
        <div class="col s12 m12 l12">
            
            <div class="row">
                <div class="input-field col s6 l4 m4 fuentes" >
                    
                    <select id="programas" name="programas">
                    <option value="" disabled selected>Seleccione un programa</option>
                        @foreach($programas as $programa);
                            @if($programa->NombrePrograma != 'GENERICO')
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            @endif
                        @endforeach

                    </select>
                    <label>Programa academico</label>
                    
                </div>

                <div class="input-field col s6 l3 m3">
                    
                    <select name="periodos" id="periodos">
                    <option value="" disabled selected>Seleccione un periodo</option>
                        @foreach($periodos as $periodo);
                            <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
                        @endforeach
                    </select>

                    <label>Periodo Academico</label>
                    
                </div>         
            </div>

            <div class="row">       
                <div class="input-field col s8 l3 m3">
                    <input id="nombreBusqueda" onkeypress="buscar();" type="text" placeholder="Nombre de la Asignatura" class="validate">   
                </div>    
            </div>

<div class="divider  grey darken-1"></div>

            <div class="row">
                <div id="tabla" class="col l12 s12 m12">
                    <table class="responsive-table striped bordered" id="asignaturas">
                        <thead >
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Creditos</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </thead>

                        <tbody>

                            @foreach ($asignaturas as $asignatura)
                        <tr>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Codigo}}</td>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Nombre}}</td>
                            <td>{{ $asignatura->programaAcademicoAsignatura->asignatura->Creditos}}</td>
                            <td>{{ $asignatura->Grupo}}</td>
                            <td> 
                                <a href="#" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons">picture_as_pdf</i></a>

                                <a data-target="#matricular" onclick="matricular({{ $asignatura->Id }})" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons" >assignment_ind</i></a>

                               <a onclick="return ver();" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosMaterias' data-tooltip="Estudiantes"><i class="material-icons">visibility</i></a>


                            </td>                    
                        </tr>
                        @endforeach
                    
                        </tbody>
                    </table>

                    {{$asignaturas->render()}}
                    

                </div>
                    
            </div>

            
    
        </div>

    </div>



  <div>
   
  </div> 

@include('admin.materias.modales.verDatosMaterias')
@include('admin.materias.modales.matricular')
@overwrite

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){  
        var ruta="{{route('admin.materiasIndex.index')}}";
        var periodo = $('#periodos').val();
        var id;
        $.ajax({
            url:ruta,
            type:"GET",
            data:{periodo:periodo},
            dataType:'json',
            success:function(data){
                console.log(data);
                $(data).each(function(key,value){
                    id=value.Id;    
                });
                $('#periodos > option[value="'+id+'"]').attr('selected', 'selected');
                        //$('#periodosProfesores').val(id);                                
            }
        });        
    });

//si selecciona un programa academico envia la peticion 
	$(document).ready(function(){
		$("#programas").change(function() {	 	
			 consultarProgramasPeriodos()	
        });                     			
//si selecciona un periodo academico se envia la peticion 
        $("#periodos").change(function() {
			 consultarProgramasPeriodos()
        });
    });

//paginacion sin recargar la pagina
	$(document).ready(function(){
        console.log($("#programas").val());
            
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            if ($("#programas").val()!=null) {
                ruta='?page=' + page;
            }else{
                ruta='?page=' + page;
            }
            console.log(ruta);
            $.ajax({
                url:ruta,
                dataType:'json',
                success:function(data){        
                    $("#tabla").html(data);   
                    $('.tooltipped').tooltip({delay: 50});                      
                }
            });     
        });
	});

    function buscar() {
        var nombreBusqueda = $("input#nombreBusqueda").val();
        var programa = $('#programas').val();
        var periodo = $('#periodos').val();
        ruta = "{{route('admin.materiasIndex.filterAjax')}}";
        $.ajax({
            type: "GET",
            url: ruta,
            data: {nombreBusqueda:nombreBusqueda,programa:programa,periodo:periodo},       
            success: function(data) {   
                $("#tabla").html(data); 
                $('.tooltipped').tooltip({delay: 50});
            }
        });            
    }

    function matricular(id){

        
                
        $('#codigo').autocomplete({
                  source: "{{url('matricular/autocomplete')}}",
                  minLength: 2,
                  select: function(event, ui) {
                    $('#codigo').val(ui.item.value);
                  }
                });
                
                $('#horario').val(id);
                $('#matricular').openModal();
            
        }


        function ver(){
            $('#verDatosMaterias').openModal();
        }


    function consultarProgramasPeriodos(){
            var programa = $('#programas').val();
            var periodo = $('#periodos').val();
            ruta = "{{route('admin.materiasIndex.filterAjax')}}";   
            console.log(ruta);
            console.log(programa);
            console.log(periodo)
                
            $.ajax({
                type: "GET",
                url: ruta,
                data: {programa:programa,periodo:periodo},
                    
                success: function(data) {   
                    $("#tabla").html(data); 
                    $('.tooltipped').tooltip({delay: 50});
                }
            });
        }

	</script>

   
@endsection
