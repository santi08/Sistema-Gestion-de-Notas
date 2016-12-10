<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelosSCAD\Horario;
use App\ModelosSCAD\Programaacademico;
use App\ModelosSCAD\Periodoacademico;
use App\ModelosSCAD\Asignatura;
use App\ModelosSCAD\ProgramaacademicoAsignatura;


class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $programas = Programaacademico::all();
        $periodos = Periodoacademico::orderBy('Id','DESC')->get();
        $ultimo_periodo= $periodos->first();

        $id_programa="" ;
        //traer ultimo Periodo
       
        $periodo_id=$ultimo_periodo->Id;  
        //traer id programa coordinador
         if(\Auth::guard('admin')->user()->rolCoordinador()){
            $id_programa=\Auth::guard('admin')->user()->usuarios[0]->programasAcademicos[0]->Id; 
        }

         $asignaturas = Horario::with('programaAcademicoAsignatura')->asignaturas($id_programa)->periodo($periodo_id)->nombreAsignaturas($request->get('nombreBusqueda'))->paginate(10);  

        if($request->ajax()){
         $asignaturas = Horario::with('programaAcademicoAsignatura')->asignaturas($request->get('programa'))->periodo($request->get('periodo'))->nombreAsignaturas($request->get('nombreBusqueda'))->paginate (10);
         $vista = view('admin.asignaturas.partialTable')->with('asignaturas',$asignaturas);
         return response()->json($vista->render());    
        }
             
        return view('admin.asignaturas.index')->with('programas',$programas)->with('periodos',$periodos)->with('asignaturas',$asignaturas);
                   
    }


    public function verDatosAsignatura(Request $request, $id){ 

        $asignatura = Horario::find($id);
        $cantidadEstudiantes= $asignatura->matriculas;

        $cantidad = count($cantidadEstudiantes);
        $aux[]=["nombre"=>$asignatura->usuario->Nombre,"programa"=>$asignatura->programaAcademicoAsignatura->programaAcademico->NombrePrograma,"apellidos"=>$asignatura->usuario->Apellidos,"cantidadEstudiantes"=> $cantidad,"asignatura"=>$asignatura->programaAcademicoAsignatura->asignatura->Nombre];

        if ($request->ajax()) {
            return response()->json($aux);
        } 
    }



    
}
