@extends('layouts.app')

@section('title','Bienvenido')



@section('content')

    <h3>Sistema de Control Académico Universitario</h3>

    <div class="row">
		<div class="col s12 m12 l12">
			<a id="prueba" class="modal-trigger btn-warning-cancel btn-flat tooltipped " data-position="bottom" data-delay="50" data-tooltip="Eliminar Item"><i class="material-icons red-text" id="eliminar" >delete</i></a>
		</div>    	
    </div>
@endsection

@section('scripts')

<script type="text/javascript">

	$('#prueba').click(function(){


    swal({   title: "Are you sure?",   
             text: "You will not be able to recover this imaginary file!",   
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes, delete it!",   
             cancelButtonText: "No, cancel plx!",   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
             function(isConfirm){   
                 if (isConfirm) {     
                     swal("Deleted!", "Your imaginary file has been deleted.", "success");   } 
                 else {
                     swal("Cancelled", "Your imaginary file is safe :)", "error");   } 
            });
	});
	
</script>


@endsection