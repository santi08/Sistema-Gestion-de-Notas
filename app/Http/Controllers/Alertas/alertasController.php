<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class alertasController extends Controller
{   

	public function alertasController(){

	}
    public function success($mensaje){
      $informacion=array('color'=>'green','mensaje'=> $mensaje);
       return $informacion;            
    } 

    public function danger($mensaje){
       $informacion=array('color'=>'red','mensaje'=> $mensaje);
       return $informacion;  
    }

    public function info($mensaje){
    	$informacion=array('color'=>'yellow','mensaje'=> $mensaje);
       return $informacion; 
    }

    public function warning($mensaje){
    	$informacion=array('color'=>'orange','mensaje'=> $mensaje);
       return $informacion; 
    }


}
