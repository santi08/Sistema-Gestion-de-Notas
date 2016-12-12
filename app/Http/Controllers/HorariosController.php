<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosSCAD\ProgramaacademicoAsignatura;
use App\ModelosSCAD\Horario;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      foreach ($horarios as $horario) {
            
         echo $horario->programaacademicoAsignatura->asignatura->Nombre.'<br>';
         echo $horario->usuario.'<br>';

      }

    }

  
}
