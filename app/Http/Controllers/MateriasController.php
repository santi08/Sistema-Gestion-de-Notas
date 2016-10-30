<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Programaacademico;
use App\Periodoacademico;
use App\ProgramaacademicoAsignatura;
use App\Horario;



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
        $horarios = Horario::orderBy('Id','ASC')->paginate(10);
        $vista = view('admin.materias.partialTable')->with('horarios',$horarios);
        if ($request->ajax()) {
            return response()->json($vista->render());
        }
           
        return view('admin.materias.materiasIndex')->with('programas',$programas)->with('periodos',$periodos)->with('horarios',$horarios);
                   
    }

    public function filterAjax(Request $request, $idprograma,$idperiodo){

        $horarios = Horario::asignaturas($idprograma)->periodo($idperiodo)->paginate(10);
            $vista = view('admin.materias.partialTable')->with('horarios',$horarios);  
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
