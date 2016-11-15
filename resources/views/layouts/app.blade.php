<!DOCTYPE html>
<html lang="en">
    <head>

        <title>@yield('title','default')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/Materialize/css/materialize.css')}}">    
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/js/dataurl.css')}}">       
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonts/style.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('plugins/jqueryui/jquery-ui.theme.min.css')}}" rel="stylesheet"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/styles.css')}}">
        <script type="text/javascript" src="{{ asset('plugins/js/pace.min.js')}}"></script>
        
    </head>

    <body id="app-layout">

        <header> 
            <!-- Navbar goes here -->
                @include('partials.nav')
        <!-- Page Layout here --> 
        </header>
    
        
        <main>

                <div class="row">
        
                    <div id="principalBox" class="col l10 m12 s12 card-panel" style="margin-left: 16.5%;"> 
                        @yield('content')
                    </div>

                </div>
        </main>


    <!-- JavaScripts  y jquery-->
    <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('plugins/jqueryui/jquery-ui.js')}}"></script>
    @yield('scripts')

    <script type="text/javascript">
    $( document ).ready(function(){
        $('.button-collapse').sideNav();
        $('.collapsible').collapsible();
        $('.dropdown-button').dropdown('open');      
        $('.tooltipped').tooltip({delay: 50});
        $('select').material_select();      

    });
    </script>
        
    <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    </body>
</html>
