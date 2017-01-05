<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',['middleware' => 'guest',function () {
    return view('bienvenido.bienvenido');
}] );

Route::group(['middleware' => 'auth'],function(){

   Route::get('/index',function(){
      return view('welcome');
    });

   // Rutas para el administrador
  Route::group( ['prefix'=>'admin', 'middleware' => 'administrador' ],function(){

  

    Route::get('verDatosAsignatura/{id}',[
        'uses' => 'AsignaturasController@verDatosAsignatura',
        'as' => 'admin.asignaturas.verDatosAsignatura'
      ]);

      Route::get('profesores',[
          'uses' => 'ProfesoresController@index',
          'as' => 'admin.profesores.index'
        ]);


      Route::post('item',[
        'uses' => 'ItemsController@store',
        'as' => 'items.store'
        ]);


      Route::post('item/edit' ,[
        'uses' => 'ItemsController@edit',
        'as' => 'item.edit'
      ]);

      //cargar informacion del item
       Route::get('item/show/{id}',[
         'uses' =>'ItemsController@show',
          'as' => 'item.show'
        ]);

     Route::get('item/{id}/destroy',[
        'uses' => 'ItemsController@destroy',
        'as' => 'item.destroy'
        ]);

      Route::post('subitem',[
        'uses' => 'SubitemsController@store',
        'as' => 'subitems.store'
      ]);

      Route::get('subitem/{id}/destroy',[
        'uses' => 'SubitemsController@destroy',
        'as' => 'subitem.destroy'
        ]);


      Route::post('subitem/edit' ,[
        'uses' => 'SubitemsController@edit',
        'as' => 'subitem.edit'
      ]);

     Route::get('nota',[
          'uses' => 'NotasController@storeItem',
          'as' => 'nota.store.item'
      ]);

      Route::get('notaSubitem',[
          'uses' => 'NotasController@storeSubitem',
          'as' => 'nota.store.subitem'
      ]);

     Route::get('MisAsignaturas',[
        'uses' => 'MatriculasController@index',
        'as' => 'matriculas.index'

      ]);

      Route::get('asignaturas',[
          'uses' => 'AsignaturasController@index',
          'as' => 'admin.asignaturas.index'
        ]);

      Route::resource('informes','InformesController');


      //reporte Asignatura
      Route::get('informes/pdfAsignatura/{idHorario}',[
        'uses'=>'InformesController@crearReporteAsignatura',
        'as'=>'admin.informes.pdfAsignatura'
        ]);
      //reporte Profesores
      Route::get('informes/pdfProfesor/{idProfesor}/{idPeriodo}/{idPrograma}',[
        'uses'=>'InformesController@crearReporteProfesor',
        'as'=>'admin.informes.pdfProfesor'
        ]);
      //reporte Estudiante
      Route::get('informes/pdfEstudiante/{idEstudiante}/{idPrograma}',[
        'uses'=>'InformesController@crearReporteEstudiante',
        'as'=>'admin.informes.pdfEstudiante'
        ]);

      //reporte General
      Route::get('informes/pdfGeneral/{periodo}/{programa}',[
        'uses'=>'InformesController@crearReporteGeneral',
        'as'=>'admin.informes.pdfGeneral'
        ]);
            

      Route::resource('estudiantes','EstudiantesController');
     
      //cargar informacion en el modal listar asignaturas Estudiante
      Route::GET('estudiantes/listarAsignaturas/{idEstudiante}/{idPeriodo}',[
        'uses' =>'EstudiantesController@listarAsignaturas',
        'as' => 'admin.estudiantes.listarAsignaturas'
        ]);   
      
      //cargar informacion en el modal eliminar
      Route::GET('estudiantes/{id}/destroy',[
        'uses' =>'EstudiantesController@destroy',
        'as' => 'admin.estudiantes.destroy'
        ]);
       // activa la accion eliminar en el modal
       Route::put('estudiantes/{id}/destroyupdate',[
         'uses' =>'EstudiantesController@destroyupdate',
          'as' => 'admin.estudiantes.destroyupdate'
        ]);
       
       //guardar Estudiantes
       Route::post('estudiantes/guardar',[
         'uses' =>'EstudiantesController@guardarEstudiante',
          'as' => 'admin.estudiantes.guardarEstudiante'
        ]);

       //cargar informacion editarEstudiante
       Route::get('estudiantes/editar/{id}',[
         'uses' =>'EstudiantesController@edit',
          'as' => 'admin.estudiantes.edit'
        ]);

       //editarEstudiante
       Route::post('estudiantes/editar',[
         'uses' =>'EstudiantesController@editar',
          'as' => 'admin.estudiantes.editar'
        ]);
       //procesarArchivo
       Route::POST('estudiantes/procesar',[
        'uses' =>'EstudiantesController@procesarArchivo',
        'as' => 'admin.estudiantes.procesarArchivo'
        ]); 

        Route::get('filtrosAsignaturas',[
         'uses' =>'AsignaturasController@filterAjax',
          'as' => 'admin.asignaturas.filterAjax'
        ]);

        Route::GET('filtrosProfesores',[
         'uses' =>'ProfesoresController@filterAjax',
          'as' => 'admin.profesores.filterAjax'
        ]);

        Route::GET('verProfesor/{id}/{idprograma}',[
         'uses' =>'ProfesoresController@ver',
          'as' => 'admin.profesores.ver'
        ]);

        //Ruta index notas
        Route::get('notas/{id}',[
          'uses' => 'NotasController@index',

          'as' => 'admin.notas.index'
          ]);

        Route::post('matricular/archivo',[
          'uses' =>'MatriculasController@matricularEstudiantes',
          'as' => 'admin.matricular.archivo'
        ]);

        Route::post('matricular/estudiante',[
          'uses' =>'MatriculasController@store',
          'as' => 'admin.matricular.estudiante'
          ]);

    });
//fin middleware administrador

    Route::group(['prefix'=>'docente','middleware' => 'docente'],function(){
      //reporte Asignatura
      Route::get('informes/pdfAsignatura/{idHorario}',[
        'uses'=>'InformesController@crearReporteAsignatura',
        'as'=>'docente.informes.pdfAsignatura'
        ]);
      //reporte General
      Route::get('informes/pdfGeneral/{periodo}/{programa}',[
        'uses'=>'InformesController@crearReporteGeneral',
        'as'=>'docente.informes.pdfGeneral'
        ]);

      Route::post('item',[
        'uses' => 'ItemsController@store',
        'as' => 'items.store'
        ]);

      Route::post('subitem',[
        'uses' => 'SubitemsController@store',
        'as' => 'subitems.store'
      ]);

     Route::get('item/{id}/destroy',[
        'uses' => 'ItemsController@destroy',
        'as' => 'item.destroy'
        ]);

      Route::get('subitem/{id}/destroy',[
        'uses' => 'SubitemsController@destroy',
        'as' => 'subitem.destroy'
        ]);

     Route::get('nota',[
          'uses' => 'NotasController@storeItem',
          'as' => 'nota.store.item'
      ]);


      Route::get('notaSubitem',[
          'uses' => 'NotasController@storeSubitem',
          'as' => 'nota.store.subitem'
      ]);

      Route::get('MisAsignaturas',[
        'uses' => 'MatriculasController@index',
        'as' => 'matriculas.index'

      ]);

      Route::get('notas/{id}',[
          'uses' => 'NotasController@index',
          'as' => 'notas.index'
        ]);

        Route::post('matricular/archivo',[
          'uses' =>'MatriculasController@matricularEstudiantes',
          'as' => 'docente.matricular.archivo'
        ]);

        Route::post('matricular/estudiante',[
          'uses' =>'MatriculasController@store',
          'as' => 'docente.matricular.estudiante'
          ]);


    });
//fin middleware coordinador

});


//rutas para el estudiante
  Route::group(['prefix'=>'admin'], function(){

    Route::get('asignaturasEstudiante',[
          'uses' => 'EstudiantesController@asignaturasEstudiante',
          'as' => 'admin.usuarios.asignaturasEstudiante'
    ]);

    //reporte Estudiante
      Route::get('informes/pdfEstudiante/{idEstudiante}/{idPrograma}',[
        'uses'=>'InformesController@crearReporteEstudiante',
        'as'=>'admin.informes.pdfEstudiante'
        ]);



  });

Route::get('login/estudiantes',[
 'uses' => 'Auth\AuthController@showLoginForm',
    'as' => 'user.login'
]);

Route::get('login/docentes',[
 'uses' => 'Admin\AuthController@showLoginForm',
    'as' => 'admin.login'
]);


Route::post('login/estudiantes',[
    'uses' => 'Auth\AuthController@login',
    'as' => 'user.login'
]);


Route::post('login/docentes',[
    'uses' => 'Admin\AuthController@login',
    'as' => 'admin.login'
]);


Route::get('matricular/autocomplete','MatriculasController@autocomplete');

Route::get('estudiantes','MatriculasController@index');


  Route::get('logoutes','Auth\AuthController@logout');

  Route::get('logoutdo','Admin\AuthController@logout');

  Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'Auth\PasswordController@reset');
   
  //Route::get('archivo','MatriculasController@matricularEstudiantes');
  Route::get('encabezado','MatriculasController@leerEncabezado');
  Route::get('materias/','MatriculasController@materias');

//rutas para el manejo de errores de paginas y de servidor
  Route::get('error',function($exception){
    abort(404);
  });
  Route::get('error',function($exception){
    abort(403);
  });
  Route::get('error',function($exception){
    abort(401);
  });

  Route::get('error',function($exception){
    abort(500);
  });

 Route::group(['prefix'=>'android'], function(){

    Route::post('iniciarSesion','AuthenticateController@authenticate');
    Route::get('notas','AuthenticateController@notas');
    Route::get('notasAsignatura','AuthenticateController@notas_asignatura');

 });

  

  



   



