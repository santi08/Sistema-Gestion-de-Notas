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

Route::get('/home', 'HomeController@index');
*/

Route::group(['prefix'=>'admin'],function(){

	Route::resource('profesoresIndex','ProfesoresController');
	Route::resource('materiasIndex','MateriasController');
	Route::resource('informesIndex','InformesController');
    Route::resource('usuarios','controladorUsuarios');

   Route::get('usuarios/{id}/destroy',[
     'uses' =>'controladorUsuarios@destroy',
      'as' => 'admin.usuarios.destroy'
    ]);

   Route::get('login','Admin\AuthController@showLoginForm');
   Route::post('login','Admin\AuthController@login');
   Route::get('logout','Admin\AuthController@logout');
   Route::get('login','Admin\AuthController@showLoginForm');

});

   Route::get('login','Auth\AuthController@showLoginForm');
   Route::post('login','Auth\AuthController@login');
   Route::get('logout','Auth\AuthController@logout');
   Route::get('login','Auth\AuthController@showLoginForm');

   Route::Auth();



