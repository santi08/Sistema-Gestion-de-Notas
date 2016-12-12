<!DOCTYPE html>
<html lang="en">
    <head>

        <title>@yield('title','default')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">

        <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.css">
    </script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="{{ asset('plugins/MaterializeAdmin/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/custom/custom.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

            
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/js/dataurl.css')}}">       
        <script type="text/javascript" src="{{ asset('plugins/js/pace.min.js')}}"></script>

        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/jvectormap/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection'">
        <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/chartist-js/chartist.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
     
    </head>

    <body id="app-layout">
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left grey darken-1"></div>
            <div class="loader-section section-right grey darken-1"></div>
        </div>

        <header> 
            <ul id="usuario" class="dropdown-content">
                <li><a href="#!">Ver perfil</a></li>
                <li>
                    @if (Auth::guard('admin')->check())
                        <a href="{{url('/logoutdo')}}">
                    @elseif (Auth::check())
                        <a href="{{ url('/logoutes') }}">   
                    @endif
                    Cerrar Sesión</a>
                </li>
                <li class="divider"></li>
            </ul>

            <div class="navbar-fixed" >
                <nav class=" gradient  s12 m3 l12 ">
                    <div class="nav-wrapper">
                        <div class="row">
                        <div class="col s6 m6 l6">
                                
                            </div>
                            <div class="col s6 l6 m6">
                                <ul id="nav-mobile" class="right hide-on-med-and-down" >
                            <li><a href="">Ayuda<i class="material-icons left">help</i></a></li>
                            <li><a class="dropdown-button" href="#!" data-constrainwidth="false" data-activates="usuario"><i class="material-icons prefix left">power_settings_new</i></a></li>
                        </ul>
                            </div>

                            
                        </div>
                        
                    </div>
                </nav>
            </div>
        </header>
       
        <div id="main">    
            <div class="wrapper">       
                <section id="content">
                    <div class="container card-panel">
                        
                            @if(Auth::guard('admin')->check())
                                @include('partials.nav')
                            @else
                                @include('partials.navEstudiantes')
                            @endif
                    
                            @yield('content')
                               
                    </div>
                </section>
            </div>
        </div>




    <script src="{{asset('plugins/jqueryui/external/jquery/jquery.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery.form.js')}}"></script>
     
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>


    <!-- chartist -->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/chartist-js/chartist.min.js')}}"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/chartjs/chart.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/chartjs/chart-script.js')}}"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/sparkline/sparkline-script.js')}}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/custom-script.js')}}"></script>

    
    <script type="text/javascript" src="{{asset('plugins/MaterializeAdmin/js/plugins/jquery-1.11.2.min.js')}}"></script>-->  
    <!--<script src="{/{asset('plugins/jquery/jquery-3.1.0.js')}}"></script> --> 
    <!--materialize js-->


   @yield('scripts')
 <script type="text/javascript">
        
    $( document ).ready(function(){
        $('.button-collapse').sideNav();
        $('.collapsible').collapsible();
        $('.dropdown-button').dropdown('open');      
        $('.tooltipped').tooltip({delay: 50});
        //$('select').material_select();      

    });
    
    function alerta(){
      if({{session()->has('alerta')}}){
      var color = "{{session('alerta.color')}}";
      var mensaje = "{{session('alerta.mensaje')}}";
      {{session()->forget('alerta')}};
      Materialize.toast(mensaje,5000,color);
      }else {"no existe alerta "}
    }

       
</script>

<script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/materialize.js')}}"></script>

    </body>
</html>
