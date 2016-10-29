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

Route::get('login',function(){
	return view('auth.login');
});

Route::group(['prefix'=>'admin'],function(){

	Route::resource('profesoresIndex','ProfesoresController');
	Route::resource('materiasIndex','MateriasController');
	Route::resource('informesIndex','InformesController');
  Route::resource('usuarios','controladorUsuarios');
   
   //cargar inforcavion en el modal eliminar
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

   
});



