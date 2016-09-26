<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class test extends Controller
{
    //

    public function getTest()
    {
        $db_ext = \DB::connection('docentes');
        $usuario = new User;
        $usuario->name='santiago';
        $usuario->email='santiaristi_1994@hotmail.com';
        $usuario->password = bcrypt('12345');
        $usuario->idrol= $db_ext->table('roles')->select('id')->where('nombre','=','CALIDAD')->value('id');

        //var_dump($idrol);
      // print($usuario);
        //$roles = $db_ext->table('roles')->get();
        //print_r($usuario->idrol);
        //$usuario->save();

      
        $profesor= [$db_ext->select('select id,nombre from usuario')]; 

        foreach ($profesor as $key => $value) {
        	echo  'id:'. $key.'='. 'nombre='.$value. '<br>';
        }
       


        
       


    }
}
