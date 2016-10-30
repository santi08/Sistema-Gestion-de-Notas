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
    return view('welcome');
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

   Route::get('usuarios/{id}/destroy',[
     'uses' =>'controladorUsuarios@destroy',
      'as' => 'admin.usuarios.destroy'
    ]);



   
  //Route::get('login','Admin\AuthController@showLoginForm');
 // Route::post('login','Admin\AuthController@login');
   
   //Route::get('logout','Admin\AuthController@logout');

   
   

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

  



   



