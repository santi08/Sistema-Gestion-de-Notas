<!DOCTYPE html>
<html>
<head>
 <title>@yield('title','default')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <link href="{{asset('plugins/MaterializeAdmin/js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('plugins/MaterializeAdmin/js/plugins/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="{{ asset('plugins/MaterializeAdmin/css/materialize.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('plugins/MaterializeAdmin/css/style.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('plugins/MaterializeAdmin/css/custom/custom.css')}}" type="text/css" rel="stylesheet">


        <link href="{{asset('plugins/tooltip/css/html5tooltips.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/tooltip/css/html5tooltips.animation.css')}}" rel="stylesheet">
         
        
        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/sweetalert/dist/sweetalert.css')}}" type="text/css" rel="stylesheet" >
    
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/js/dataurl.css')}}">
         <link href="{{ asset('plugins/MaterializeAdmin/css/estilo-tabla-notas.css')}}" type="text/css" rel="stylesheet">
          <link href="{{ asset('plugins/MaterializeAdmin/css/estilo-tabla-notas.css')}}" type="text/css" rel="stylesheet">

        
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">

        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/chartist-js/chartist.min.css')}}" type="text/css" rel="stylesheet">


    </head>

    <body id="app-layout">
        <header> 
            
            <div class="navbar-fixed" >
                <nav class=" gradient  s12 m3 l12 ">
                    <div class="nav-wrapper">
                        <div class="row">

                            <div class="col s6 m6 l6 hide-on-small-only hide-on-med-only offset-l1 hide-on-small-only  ">
                                <img src="{{ asset('img/logo.png')}}" alt="Sistema Control Académico Universitario"> 
                            </div>
                            <div class="col s1 l1 m1 offset-l4 offset-s9">

                                   
                                <a class="" @if(Auth::guard('admin')->check()) href="{{url('/logoutdo')}}" @elseif(Auth::check()) href="{{ url('/logoutes') }}" @endif()

                                  data-activates="usuario" data-position="bottom" data-delay="50" data-tooltip="asignaturas"><i class="mdi-action-settings-power left"></i></a>
                        
                            </div>

                            
                        </div>
                        
                    </div>
                </nav>
            </div>
        </header>
       
           
            <div class="wrapper">       
                <section id="content">
                    <div class="container card-panel">
                        
                            @if(Auth::guard('admin')->check())
                                @include('partials.navNota')
                            @else
                                @include('partials.navEstudiantes')
                            @endif
                    
                            @yield('content')
                               
                    </div>
                </section>
            </div>
        
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/materialize.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/prism/prism.js')}}"></script>
    
    <!--<script src="{ {asset('plugins/jqueryui/external/jquery/jquery.js')}}"></script>-->
    <script src="{{asset('plugins/jquery/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('plugins/js/pace.min.js')}}"></script>     
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- chartist -->
    <!--<script type="text/javascript" src="{ {asset('plugins/MaterializeAdmin/js/plugins/chartist-js/chartist.min.js')}}"></script> -->  

    <!-- chartjs -->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/chartjs/chart.min.js')}}">
        
    </script>
    <!-- sparkline -->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/sparkline/sparkline-script.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/custom-script.js')}}"></script>

    <!--tooltips-->
    <script src="{{asset('plugins/tooltip/functions.js')}}"></script>
    <script src="{{asset('plugins/tooltip/html5tooltips.js')}}"></script>

    

    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/editable-table/numeric-input-example.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/editable-table/mindmup-editabletable.js')}}"></script>
    <!-- Tabla Flotante -->
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/floatThead/jquery.floatThead.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/floatThead/jquery.floatThead-slim.min.js') }}"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/custom-script.js')}}"></script>

   
   @yield('scripts')
 <script type="text/javascript">
        
    $( document ).ready(function(){
        $('.button-collapse').sideNav();
        $('.collapsible').collapsible();
       // $('.dropdown-button').dropdown('open');      
        $('.tooltipped').tooltip({delay: 50});
        //$('select').material_select();  
         
         

    });
    
</script>



    </body>
</html>
