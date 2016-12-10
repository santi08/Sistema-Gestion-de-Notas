@extends('layouts.app')
@section('title','Asignaturas')

@section('content')
	<h4 class="center">Asignaturas</h4>
    <br>
    <div class="row">
        <div class="col s12 m12 l12">
            
            <div class="row">
                
                <div class="input-field col s6 l4 m4 fuentes" >

                @if (Auth::guard('admin')->user()->rolAdministrador())
                    {{-- expr --}}

                    <select id="programas" name="programas">
                    <option value="" disabled selected>Seleccione un programa</option>
                        @foreach($programas as $programa);
                            @if($programa->NombrePrograma != 'GENERICO')
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            @endif
                        @endforeach

                    </select>
                    <label>Programa academico</label>


                @elseif (Auth::guard('admin')->user()->rolCoordinador())
                     <select id="programas" name="programas">
                        @foreach(Auth::guard('admin')->user()->usuarios[0]->programasAcademicos as $programa);
                           
                                <option value="{{$programa->Id}}" id="{{$programa->Id}}">{{$programa->NombrePrograma}}</option>
                            
                        @endforeach

                    </select>                    
                @endif
                    
                    
                    
                </div>

                <div class="input-field col s6 l3 m3">
                    
                    <select name="periodos" id="periodos">
                    
                        @foreach($periodos as $periodo);
                            <option value="{{$periodo->Id}}" id="{{$periodo->Id}}">{{$periodo->Ano." ".$periodo->Periodo}}</option>
                        @endforeach
                    </select>

                    <label>Periodo Academico</label>
                    
                </div>
                <div class="col ">
    <div class="input-field">
        <input id="nombreBusqueda" type="search" onkeyup="buscar()" required>
        <label for="search"><i class="material-icons">search</i></label>
        <i class="material-icons">close</i>
    </div>
</div>
             
            </div>

          <!--  <div class="row">       
                <div class="input-field col s8 l3 m3">
                    <input id="nombreBusqueda" onkeypress="buscar();" type="text" placeholder="Nombre de la Asignatura" class="validate">   
                </div>    
            </div>-->


<hr>

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
                            <td>  <a href="{{route('admin.informes.pdfAsignatura',$asignatura->Id)}}" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informes" ><i class="material-icons">picture_as_pdf</i></a>

                              <a data-target="#matricular" onclick="matricular({{ $asignatura->Id }})" class="btn-floating btn-small waves-effect waves-light green modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-tooltip="Matricular"><i class="material-icons" >assignment_ind</i></a>

                               <a onclick="return ver({{$asignatura->Id}});" class="btn-floating btn-small waves-effect waves-light blue modal-trigger btn tooltipped " data-position="bottom" data-delay="50" data-target='#verDatosAsignaturas' data-tooltip="Ver"><i class="material-icons">visibility</i></a>


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



@include('admin.asignaturas.modales.matricular')
@include('admin.asignaturas.modales.verDatosAsignaturas')
@overwrite


@section('scripts')

	<script type="text/javascript">

    $(document).ready(function(){ 
        $("#programas").material_select();
         $("#periodos").material_select(); 
        var ruta="{{route('admin.asignaturas.index')}}";
        var periodo = $('#periodos').val();
        var id;
        $.ajax({
            url:ruta,
            type:"GET",
            data:{periodo:periodo},
            dataType:'json',
            success:function(data){
                
                $(data).each(function(key,value){
                    id=value.Id;    
                });
                $('#periodos > option[value="'+id+'"]').attr('selected', 'selected');
                        //$('#periodosProfesores').val(id);                                
            }
        }); 
//si selecciona un programa academico envia la peticion 
        $("#programas").change(function() {     
             consultas()    
        });  
//si selecciona un periodo academico se envia la peticion 

         $("#periodos").change(function() {
             consultas()
        });     
    });


//paginacion sin recargar la pagina
    $(document).ready(function(){
        console.log($("#programas").val());           
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            var programa = $('#programas').val();
            var periodo = $('#periodos').val();
            var nombreBusqueda = $("input#nombreBusqueda").val();

            console.log(page);
           
            var ruta='?page=' + page;
            console.log(ruta);
            $.ajax({
                url:ruta,
                type:"GET",
                dataType:'json',
                data: {nombreBusqueda:nombreBusqueda,programa:programa,periodo:periodo},
                success:function(data){        
                    $("#tabla").html(data);   
                    $('.tooltipped').tooltip({delay: 50});                      
                }
            });     
        });
    });

    function buscar() {
        consultas();
    }

    function matricular(id){
          
        $('#codigo').autocomplete({
                  source: "{{url('matricular/autocomplete')}}",
                  minLength: 2,
                  select: function(event, ui) {
                    $('#codigo').val(ui.item.value);
                  }
                });
                
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
        
    function consultas(){
            var programa = $('#programas').val();
            var periodo = $('#periodos').val();
            var nombreBusqueda = $("input#nombreBusqueda").val();

            ruta = "{{route('admin.asignaturas.index')}}";   
            console.log(ruta);
            console.log(programa);
            console.log(periodo)
                
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

    </script>
   
@endsection
