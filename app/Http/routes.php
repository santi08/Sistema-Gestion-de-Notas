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

Route::get('/', function () {
    return view('bienvenido.bienvenido');
});



Route::get('login',function(){
	return view('auth.login');
});

Route::group( ['prefix'=>'admin'],function(){


  Route::group( ['prefix'=>'secretario'],function(){

  });


  Route::group( ['prefix'=>'coordinador'],function(){

  });
  

  Route::group( ['prefix'=>'docente'],function(){

  });


	Route::resource('profesoresIndex','ProfesoresController');
	Route::resource('materiasIndex','MateriasController');
	Route::resource('informesIndex','InformesController');
  Route::resource('estudiantes','EstudiantesController');
  Route::resource('notasIndex','NotasController');
  
  Route::get('estudiantes/prueba',[
    'uses' =>'EstudiantesController@prueba',
    'as' => 'admin.estudiantes.prueba'
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

    Route::get('materiasIndex/{programaid}/{periodoid}',[
     'uses' =>'MateriasController@filterAjax',
      'as' => 'admin.materiasIndex.filterAjax'
    ]);

  

});


Route::group( ['prefix'=>'estudiante'],function(){



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


  

  //Route::get('/home', 'HomeController@index');

  Route::auth();

   //Route::post('redirigir','autenticacionController@obtenerControlador');
   //Route::post('login','Admin\AdminAuthController@login');
   //Route::get('login', 'Auth\AuthController@showLoginForm');
   //Route::post('login','Auth\AuthController@login');
   Route::get('logoutes','Auth\AuthController@logout');

  Route::get('logoutdo','Admin\AuthController@logout');

  Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'Auth\PasswordController@reset');
   
  Route::get('archivo','ProfesoresController@cargarMateria');

  



   



