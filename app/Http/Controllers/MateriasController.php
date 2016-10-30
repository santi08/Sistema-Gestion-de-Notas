<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use App\Programaacademico;
use App\Periodoacademico;
use App\Http\Requests;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ProgramasAcademicos = Programaacademico::all(); 
            $PeriodosAcademicos = Periodoacademico::all();

        $asignaturas =  Horario::orderBy('Id','asc')->paginate(10); 


    $asignaturas2 = Horario::whereHas('programaAcademicoAsignatura', function ($query) {
                                $query->where('programaacademicoId', '=', '2');
                            })->paginate(10);
        
         return view('admin.materias.materiasIndex')->with('asignaturas',$asignaturas)->with('ProgramasAcademicos',$ProgramasAcademicos)->with('PeriodosAcademicos',$PeriodosAcademicos);
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
