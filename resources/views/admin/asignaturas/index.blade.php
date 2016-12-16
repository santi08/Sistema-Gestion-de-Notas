@extends('layouts.app')
@section('title','Asignaturas')

@section('content')
<h3 class="center">Asignaturas</h3>
<br>
<div class="row">
    <div class="col s12 m12 l12 dataTables_wrapper" id="data-table-simple_wrapper"> 
        <fieldset class="grey lighten-4">  
            <div class="row">
                <div class="input-field col s9 l4 m4 fuentes" >
                    @if (Auth::guard('admin')->user()->rolAdministrador())
                        <select id="programas" name="programas">
                            <option value="" disabled selected>Seleccione un programa</option>
                            @foreach($programas as $programa);
                                @if($programa->NombrePrograma != 'GENERICO')
                                    <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                                @endif
                            @endforeach
                        </select>
                            <label>Programa Académico</label>
                    @elseif (Auth::guard('admin')->user()->rolCoordinador())
                        <select id="programas" name="programas" required>
                            @foreach(Auth::guard('admin')->user()->usuarios[0]->programasAcademicos as $programa);
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            @endforeach

                        </select> 
                        <label>Programa Académico</label>                   
                    @endif            
                </div>

                <div class="input-field col s3 l3 m3">   
                    <select name="periodos" id="periodos">
                        @foreach($periodos as $periodo);
                            <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
                            @endforeach
                    </select>
                    <label>Periodo Académico</label>
                </div>

                <div class="col s1 m1 l1">
                             <i class=" mdi-communication-live-help blue-text" data-tooltip="Escoge un programa o un perido que desees filtrar"  data-tooltip-animate-function="slidein" data-tooltip-stickto="right"  data-tooltip-color="#424242" data-tooltip-maxwidth="200"></i>
                </div>  

            </div>
        </fieldset>
        <div class="row">
            <div class="col s1 m1 l1 offset-l11 offset-m11 offset-s11">
              
               <i class="mdi-action-info blue-text" data-tooltip="Hola, en esta sección podras: matricular estudiantes a las asignaturas que desees, puedes consultar información  y generar un reporte de aquellas asignaturas que tengan estudiantes matriculados"  data-tooltip-animate-function="slidein" data-tooltip-stickto="left"  data-tooltip-color="#424242" data-tooltip-maxwidth="300"></i>

            </div>     
        </div>

        

            <!--<div class="row">
                <div class="col s12 l12 m12 ">
                    <div id="data-table-simple_filter" class="header-search-wrapper teal dataTables_filter" >
                        <i class="mdi-action-search"></i>
                        <input type="search"  class="header-search-input z-depth-2" placeholder="Buscar Asignatura" aria-controls="data-table-simple">
                    </div>
                </div>               
            </div>-->


       
<div class="divider  grey darken-1"></div>
<br>   
        <div class="row">
            <div id="tabla" class="col l12 s12 m12">
                
            </div>
        </div>
    </div>
</div>



@include('admin.asignaturas.modales.matricular')
@include('admin.asignaturas.modales.verDatosAsignaturas')
@overwrite

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){
       
        consulta();

        $("#verDatosAsignaturas").addClass("modalDelaMateria");
        $("#matricular").addClass("modalMatricula");

        $("#periodos").change(function() {
             consulta()
        });    
        
        $("#programas").change(function() {     
             consulta()    
        });  
    });
    
    function matricular(id){
          
       /* $('#codigo').autocomplete({
                  source: "{/{url('matricular/autocomplete')}}",
                  minLength: 2,
                  select: function(event, ui) {
                    $('#codigo').val(ui.item.value);
                  }
                });*/
                
                $('#horario_estudiante').val(id);
                $('#horario_archivo').val(id);
                $('#matricular').openModal();        
    }

    function ver(id){
        var ruta="{{route('admin.asignaturas.verDatosAsignatura',['%idhorario%'])}}";
        var tablaAsignaturas = $("#tablaAsignaturas");
        var programa = $('#programasProfesores').val();
        var periodo = $('#periodosProfesores').val();   
        $("#tablaAsignaturas td").remove();      
        ruta = ruta.replace('%idhorario%',id);
        
        $.ajax({
            url:ruta,
            type:"GET",
            data: {programa:programa,periodo:periodo},
            dataType:'json',
            success:function(data){
                console.log(data)
                $(data).each(function(key,value){
                    $("#nombreMateria").text(value.asignatura);
                    tablaAsignaturas.append("<tr><td>"+value.nombre+" "+value.apellidos +"</td><td>"+value.cantidadEstudiantes+"</td><td></td></tr>");    
                });
                 $('#verDatosAsignaturas').openModal();                                  
            }
        });        
    }
        
    function consulta(){
            var programa = $('#programas').val();
            var periodo = $('#periodos').val();
            ruta = "{{route('admin.asignaturas.index')}}";   
            console.log(ruta);
            console.log(programa);
            console.log(periodo);

            $('#data-table-simple').DataTable({
                retrieve:true
            }).destroy();

            $.ajax({
                type: "GET",
                url: ruta,
                data: {programa:programa,periodo:periodo},     
                success: function(data) {   
                    $("#tabla").html(data);
                    $('#data-table-simple').DataTable({
                        "language":{
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        }
                    });

                    $('.tooltipped').tooltip({delay: 50});
                }
            });
        }
    </script>
@endsection
