<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alertas extends Model
{
   public function alertas(){

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

    public function crearAlerta($tipo,$mensaje){
    $alerta = new alertas();
    switch ($tipo) {
     case 'success':
       $alerta=$alerta->success($mensaje);
       break;
     case 'danger':
       $alerta=$alerta->danger($mensaje);
       break;
     case 'info':
       $alerta=$alerta->info($mensaje);
       break;
     case 'warning':
       $alerta=$alerta->warning($mensaje);
       break;      
     
     default:
       " esta alerta no existe ";
       break;
   }
   
     session()->put('alerta',$alerta); 
   

   }
}
