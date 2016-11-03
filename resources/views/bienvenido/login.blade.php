<div class="row">
                    
                    <div class="col s9 m7 l4 card-panel centrar offset-s1 offset-l4 offset-m3 z-depth-3 bordes " style="padding:none; ">
                        
                        <div class="row">
                            <div class="col s6 waves-light-red center waves-effect waves-teal card" onclick="mostrarDocente()" id="boxDocentes">
                               <h6>Docente</h6>
                            </div>

                             <div class="col s6  waves-effect center waves-teal card" onclick="mostrarEstudiante()" id="boxEstudiantes">
                                <h6>Estudiante</h6>
                            </div>
                        </div>
                        <div id="loginDocentes">
                         {!! Form::open(['route'=> 'admin.login', 'method' => 'POST']) !!}

                             {{ csrf_field() }}

                            <div class="row">
                                <div class="col s12  centrar input-field">
                                    <input id="UsuarioIdentificacion" type="email" name="UsuarioIdentificacion" class="validate">
                                    
                                    <label for="UsuarioIdentificacion">Correo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12  centrar input-field ">
                                    <input id="password" type="password" name="password" class="validate" name="password">
                                    <label for="password ">Contraseña</label>
                                </div>
                            </div>

                              @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="row offset-m3">
                                 <div class="col s6 offset-s4">
                                    <button class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Entrar
                                   </button> 
                                      
                                </div>
                            </div>

                           {!! Form::close() !!}

                        <div class="row">
                            <div class="col s12 m12 l12 input-field center">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>
                        </div>

                        <div id="loginEstudiantes" style="display: none;">
                       {!! Form::open(['route'=> 'user.login', 'method' => 'POST']) !!}

                             {{ csrf_field() }}

                            <div class="row">
                                <div class="col s12  centrar input-field {{ $errors->has('codigo') ? ' has-error' : '' }}">
                                    <input id="codigo" type="text" name="codigo" class="validate" value="{{ old('codigo') }}" required="">
                                    
                                    <label for="codigo">Código</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12  centrar input-field ">
                                    <input id="password" type="password" class="validate" name="password" required="">
                                    <label for="password ">Contraseña</label>
                                </div>
                            </div>

                             @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div class="row offset-m3">
                                 <div class="col s6 offset-s4">
                                    <button class="btn waves-effect waves-light waves-red red darken-4 offset-l4 valing" type="submit" name="action">Entrar
                                   </button> 
                                      
                                </div>
                            </div>

                           {!! Form::close() !!}

                        <div class="row">
                            <div class="col s12 m12 l12 input-field center">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>
                        </div>



                    </div>

                    
</div>