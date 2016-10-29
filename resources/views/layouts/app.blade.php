<!DOCTYPE html>
<html lang="en">
    <head>

        <title>@yield('title','default')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/Materialize/css/materialize.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonts/style.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/styles.css')}}">
        <meta charset="utf-8">
    </head>

    <body id="app-layout">

        <header> 
            <!-- Navbar goes here -->
                @include('partials.nav')
        <!-- Page Layout here --> 
        </header>
    
        
        
        <div class="row">
            <div class="col l4 m6 ">
                
            </div>
            <div class="col l8 m6 card-panel"> 
                  @yield('content')
            </div>

        </div>
        <!-- JavaScripts  y jquery-->
        <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
        <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.css"></script>
        <script type="text/javascript">
            $( document ).ready(function(){
               // $(".button-collapse").sideNav();
                $('.button-collapse').sideNav();
                $('.collapsible').collapsible();
                $('.dropdown-button').dropdown('open');
                
                $("a.delete").confirm();
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.collapsible').collapsible({
                    accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                    
                });
            });

        </script>
        <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
  <script type="text/javascript">
  </script>

  @yield('scripts')
    </body>
</html>
