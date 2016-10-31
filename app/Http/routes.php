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



//Route::auth('login','Auth/AuthController@getLogin');
/*Route::auth('login','Auth\AuthController@getLogin');
Route::post('login','Auth\AuthController@getLogin');

Route::get('admin/profesores','ProfesoresController@index');


*/


Route::get('login',function(){
	return view('auth.login');
});

Route::group(['prefix'=>'admin'],function(){

	Route::resource('profesoresIndex','ProfesoresController');
	Route::resource('materiasIndex','MateriasController');
	Route::resource('informesIndex','InformesController');
  Route::resource('usuarios','controladorUsuarios');
<<<<<<< HEAD

=======
   
   //cargar inforcavion en el modal eliminar
>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811
   Route::get('usuarios/{id}/destroy',[
     'uses' =>'controladorUsuarios@destroy',
      'as' => 'admin.usuarios.destroy'
    ]);
   // activa la accion eliminar en el modal
   Route::PUT('usuarios/{id}/destroyupdate',[
     'uses' =>'controladorUsuarios@destroyupdate',
      'as' => 'admin.usuarios.destroyupdate'
    ]);
   //guardar Estudiantes
   Route::POST('usuarios/guardar',[
     'uses' =>'controladorUsuarios@guardarEstudiante',
      'as' => 'admin.usuarios.guardarEstudiante'
    ]);

   //cargar informacion editarEstudiante
   Route::get('usuarios/editar/{id}',[
     'uses' =>'controladorUsuarios@edit',
      'as' => 'admin.usuarios.edit'
    ]);

   //editarEstudiante
   Route::POST('usuarios/editar',[
     'uses' =>'controladorUsuarios@editar',
      'as' => 'admin.usuarios.editar'
    ]);

<<<<<<< HEAD


   
  //Route::get('login','Admin\AuthController@showLoginForm');
 // Route::post('login','Admin\AuthController@login');
   
   //Route::get('logout','Admin\AuthController@logout');

   
   

=======
   
>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811
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

  



   



