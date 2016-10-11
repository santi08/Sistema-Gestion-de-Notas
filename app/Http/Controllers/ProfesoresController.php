<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Usuario;
use App\Horario;


class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$profesores=Horario::all()->where(Horario::find(5));
            $profesores = \DB::connection('docentes')->table('horario')->distinct('programaacademico.Id')->join('usuario', 'UsuarioID' ,'=' ,'usuario.Id')->join('programaacademico_asignatura', 'horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id')->join('asignatura','programaacademico_asignatura.AsignaturaId','=','asignatura.Id')->select('usuario.id','usuario.nombre','usuario.Apellidos','programaacademico.NombrePrograma')->where('periodoacademicoId','=',5)->orderBy('usuario.nombre','asc')->get();

            $asignaturas=\DB::connection('docentes')->table('horario')->join('usuario', 'UsuarioID' ,'=' ,'usuario.Id')->join('programaacademico_asignatura', 'horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id')->join('asignatura','programaacademico_asignatura.AsignaturaId','=','asignatura.Id')->select('horario.id','asignatura.codigo', 'asignatura.nombre','asignatura.creditos')->where('periodoacademicoId','=',5)->orderBy('usuario.nombre','asc')->get();

           


        

        return view('admin.profesores.profesoresIndex')->with('profesores',$profesores)->with('asignaturas',$asignaturas);
        //dd($profesores);
        //dd($asignaturas);
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

    public function paginateArray($data, $perPage)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);
    }

}
