<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class autenticacionController extends Controller
{
    //
     use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function obtenerControlador(Request $request){

   	 	$entrada= $request->email;
   	 	$password =$request->password;
        $dato = substr($entrada, 0,1);

         

        if(!is_numeric($dato)){
            /*$request['UsuarioIdentificacion']=\DB::connection('docentes')->table('usuario')->select('id')->where('correo','=',$entrada)->value('id');
            $request['Contrasena']=$password;
			*/
            

            //echo 'Entro en controlador Administrador';

            //return redirect()->action('controladorUsuarios@index');
            return redirect()->action('Admin\AuthController@login');
           //return redirect()->route('login', array('method' => 'post'));


        }else{
        	
            //echo 'Entro en controlador estudiante';
           return redirect()->action('Auth\AuthController@login');

        }

	}


}
