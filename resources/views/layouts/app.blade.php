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
        
        
    </head>

    <body id="app-layout">

        <header> 
            <!-- Navbar goes here -->
                @include('partials.nav')
        <!-- Page Layout here --> 
        </header>
    
        
        
        <div class="row">
            <div class="col l2 m6 ">
                
            </div>
            <div class="col l10 m6 card-panel"> 
            @if (Auth::guard('admin')->check())

                    @if (count(Auth::guard('admin')->user()->sesionRoles) > 1)
                        <div class="row col s3">
                        <label>Seleccione su rol</label>
                             <select>
                              @foreach (Auth::guard('admin')->user()->sesionRoles as $rol)
                                
                                <option>{{ $rol->rol->Nombre}}</option>
                              @endforeach
                               
                             </select>

                         </div>
                    @endif
                  
                @endif
                  @yield('content')
            </div>

        </div>
        <!-- JavaScripts  y jquery-->
        <script src="{{asset('plugins/jquery/jquery-3.1.0.js')}}"></script>
    


    @yield('scripts')

        <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.css"></script>

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

        <script type="text/javascript">
            $(document).ready(function(){
                $('.collapsible').collapsible({
                    accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
                    
                });
            });

            $(document).ready(function() {
            $('select').material_select();
            });

        </script>


  <script src="{{asset('plugins/Materialize/js/materialize.js')}}"></script>
    </body>
</html>
