<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conexionDocentes = \DB::connection('docentes');

        $sql ='SELECT DISTINCT c.Id,(SELECT e.nombre from usuario e WHERE e.id = a.UsuarioID) as Nombre , (SELECT e.Apellidos from usuario e WHERE e.id = a.UsuarioID) as Apellidos, c.NombrePrograma, d.Nombre as Asignatura
                from horario a
                INNER JOIN programaacademico_asignatura b on a.AsignaturaId = b.Id
                INNER JOIN programaacademico c on b.programaacademicoId = c.Id
                INNER JOIN asignatura d on b.AsignaturaId = d.Id
                where a.PeriodoAcademicoId = 5 ORDER BY nombre ASC';

        $profesores = $conexionDocentes->select(\DB::RAW($sql));
        $profesores = $this->paginateArray($profesores, 10);

        return view('admin.profesores.profesoresIndex')->with('profesores',$profesores);
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
