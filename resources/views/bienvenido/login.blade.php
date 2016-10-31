<div class="col s9 m7 l4 card-panel centrar offset-s1 offset-l4 offset-m3 z-depth-3 bordes ">
                        
                        <div class="row">
                            <div class="col s6 waves-light-red center waves-effect waves-teal card" onclick="mostrarDocente()">
                               <h6>Docente</h6>
                            </div>

                             <div class="col s6  waves-effect center waves-teal card" onclick="mostrarEstudiante()">
                                <h6>Estudiante</h6>
                            </div>
                        </div>
                        <div id="loginDocentes">
                        {!!Form::open([ 'method' =>'POST','class'=>'col s12', ])!!}      
                        <div class="row">
                            <div class="col s12  centrar input-field">
                                <input id="email" type="email" class="validate">
                                
                                <label for="email">Correo</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12  centrar input-field ">
                                <input id="password" type="password" class="validate ">
                                <label for="password ">Contraseña</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field ">
                                <button class="btn waves-effect waves-light waves-green  boton red darken-4" type="submit" name="action">Entrar
                                
                                </button>     
                            </div>
                        </div>
                        
                        {!!Form::close()!!}

                        <div class="row">
                            <div class="col s12 m12 l12 input-field center">
                                <p>
                                    <a href="www.google.com">¿Olvidaste tu contraseña?</a>
                                </p>
                            </div>
                        </div>
                        </div>