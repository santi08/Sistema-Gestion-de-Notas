<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelosSCAD\Horario;
use App\ModelosSCAD\Programaacademico;
use App\ModelosSCAD\Periodoacademico;
use App\ModelosSCAD\Asignatura;
use App\ModelosSCAD\ProgramaacademicoAsignatura;


class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $programas = Programaacademico::all();
        $periodos = Periodoacademico::all(); 
        
        $asignaturas = Horario::with('programaAcademicoAsignatura')->asignaturas($request->get('programa'))->periodo($request->get('periodo'))->nombreAsignaturas($request->get('nombreBusqueda'))->paginate(10);


        //$asignaturas = Horario::with('programaAcademicoAsignatura')->orderBy('Id','ASC')->paginate(10);
        $vista = view('admin.materias.partialTable')->with('asignaturas',$asignaturas);

        if ($request->ajax()) {
            return response()->json($vista->render());
        } 
        return view('admin.materias.materiasIndex')->with('programas',$programas)->with('periodos',$periodos)->with('asignaturas',$asignaturas);
    }


    public function filterAjax(Request $request){



        /*$asignaturas = Horario::with('programaAcademicoAsignatura')->asignaturas($request->get('programa'))->periodo($request->get('periodo'))->nombreAsignaturas($request->get('nombreBusqueda'))->paginate(10);
        
        $vista = view('admin.materias.modales.paginacion2')->with('asignaturas',$asignaturas);  

        if ($request->ajax()) {
            return response()->json($vista->render());
        } */

        
    }

    public function verDatosMateria(Request $request, $id){

        $asignatura = Horario::find($id);

        $aux[]=["nombre"=>$asignatura->usuario->Nombre,"programa"=>$asignatura->programaAcademicoAsignatura->programaAcademico->NombrePrograma,"apellidos"=>$asignatura->usuario->Apellidos,"asignatura"=> $asignatura->programaAcademicoAsignatura->asignatura->Nombre];

         if ($request->ajax()) {
            return response()->json($aux);
        } 
    }



    
}
