 
  <!-- Contenido Modal-->
 
  <div id=@yield('id') class="modal @yield('class')" >
    <div class="modal-content">
     <div class="card-panel ">
      @yield('contenido')
     </div>
      @yield('footer')
    </div>
  </div>
 
  