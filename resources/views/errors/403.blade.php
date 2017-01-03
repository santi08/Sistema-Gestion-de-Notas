<!DOCTYPE html>
<html lang="en">

<!--================================================================================
    Item Name: Materialize - Material Design Admin Template
    Version: 3.1
    Author: GeeksLabs
    Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>403</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{asset('plugins/MaterializeAdmin/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ asset('plugins/MaterializeAdmin/css/custom/custom.css')}}" type="text/css" rel="stylesheet" media="">
        <link href="{{ asset('plugins/MaterializeAdmin/css/layouts/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/prism/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body>
  
  <div id="error-page">

      <div class="row">
         <div class="col s12">
            <div class="browser-window">
               <div class="top-bar">
                  <div class="circles">
                     <div id="close-circle" class="circle"></div>
                     <div id="minimize-circle" class="circle"></div>
                     <div id="maximize-circle" class="circle"></div>
                  </div>
               </div>
               
               <div class="content">
                  <div class="row">
                     <div id="site-layout-example-top" class="col s12">
                        <p class="flat-text-logo center white-text caption-uppercase">!UPS¡, lo sentimos pero no tienes acceso a esa url</p>
                     </div>
                     
                     <div id="site-layout-example-right" class="col s12 m12 l12">
                        <div class="row center">
                           <h1 class="text-long-shadow col s12">403</h1>
                        </div>
                        
                     </div>

                     <div class="row center">
                           <p class="center  col s12">lo sentimos vuelve atras o al inicio.</p>
                           <p class="center s12"><button onclick="goBack()" class="btn teal waves-effect waves-light">Atras</button> <a href="{{url('/')}}" class="btn teal waves-effect waves-light">Inicio</a></p>
                        
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/jquery-1.11.2.min.js')}}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/materialize.js')}}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/prism/prism.js')}}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/plugins.js')}}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('plugins/MaterializeAdmin/js/custom-script.js')}}"></script>
  
  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>