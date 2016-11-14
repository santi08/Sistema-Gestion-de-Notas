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
        
        $asignaturas = Horario::with('programaAcademicoAsignatura')->orderBy('Id','ASC')->paginate(10);

        $vista = view('admin.materias.partialTable')->with('asignaturas',$asignaturas);

        if ($request->ajax()) {
            return response()->json($vista->render());
        } 
        return view('admin.materias.materiasIndex')->with('programas',$programas)->with('periodos',$periodos)->with('asignaturas',$asignaturas);
    }

    public function filterAjax(Request $request){

        $asignaturas = Horario::with('programaAcademicoAsignatura')->asignaturas($request->get('programa'))->periodo($request->get('periodo'))->nombreAsignaturas($request->get('nombreBusqueda'))->paginate(10);
        
        $vista = view('admin.materias.partialTable')->with('asignaturas',$asignaturas);  

        if ($request->ajax()) {
            return response()->json($vista->render());
        } 

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    
}
