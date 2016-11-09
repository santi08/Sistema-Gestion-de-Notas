<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\ModelosSCAD\Usuario;
use App\ModelosSCAD\Horario;
use App\ModelosSCAD\Programaacademico;
use App\ModelosSCAD\ProgramaacademicoAsignatura;
use App\ModelosSCAD\Periodoacademico;
use Maatwebsite\Excel\Facades\Excel;



class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $ProgramasAcademicos = Programaacademico::all(); 
        $PeriodosAcademicos = Periodoacademico::all();

        if ($request->ajax()) {
            $ultimo=$PeriodosAcademicos->last();
           return response()->json($ultimo->toArray());
        }


        $profesores = Horario::distinct()
                                ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,                   'programaacademico_asignatura.Id')
                                ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma','programaacademico.Id as idprograma')
                                ->orderBy('usuario.Nombre')->paginate(10);


      return view('admin.profesores.profesoresIndex')->with('profesores',$profesores)->with('ProgramasAcademicos',$ProgramasAcademicos)->with('PeriodosAcademicos',$PeriodosAcademicos);
    
    }

     public function filterAjax(Request $request){

        
            $h=$request->get('programa');
            $p=$request->get('periodo');
            /*$profesores = Horario::distinct()
                                ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,                   'programaacademico_asignatura.Id')
                                ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))->where('programaacademico_asignatura.programaacademicoId', '=', $request->get('programa')->orwhere('usuario.Nombre','like',$request->get('nombreBusqueda').'%'))
                                ->orderBy('usuario.Nombre')->paginate(10);*/

            /*$profesores = Horario::distinct()
                                ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,                   'programaacademico_asignatura.Id')
                                ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')->where('usuario.Nombre','like',$request->get('nombreBusqueda').'%')->where(function($query) use($h,$p){
                                        $query->where('programaacademico_asignatura.programaacademicoId','=',$h)->orWhere('horario.PeriodoAcademicoId','=',$p);
                                    })->orderBy('usuario.Nombre')->paginate(10);*/

                                      $profesores = Horario::distinct()
                                ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,                   'programaacademico_asignatura.Id')
                                ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')->where('usuario.Nombre','like',$request->get('nombreBusqueda').'%')->orWhere('programaacademico_asignatura.programaacademicoId','=',$request->get('programa'))->orWhere('horario.PeriodoAcademicoId','=',$request->get('periodo'))->orderBy('usuario.Nombre')->paginate(10);

            
       
        
        $vista = view('admin.profesores.partialTable')->with('profesores',$profesores); 
         
        if ($request->ajax()) {
            return response()->json($vista->render());
        } 
    }


    public function ver(Request $request,$id,$idprograma){

        $profesor = Horario::join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=','programaacademico_asignatura.Id')->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('asignatura', 'programaacademico_asignatura.AsignaturaId', '=' ,'asignatura.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('usuario.Id','usuario.Nombre as name','usuario.Apellidos','asignatura.Nombre', 'asignatura.Codigo','asignatura.Creditos','horario.Grupo')->where('usuario.Id',$id)->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))->where('programaacademico.Id','=',$idprograma)->get();
                            
        
        return response()->json($profesor->toArray());
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

    public function cargarMateria(){

        Excel::selectSheetsByIndex(0)->load('public/listado.xls',function($archivo)
        {

            //$resultado = $archivo->limit(false,3);
            $archivo->noHeading();
            $archivo->skip(3);
            $resultado = $archivo->toArray();
           
            dd($resultado);

        //$archivo->each(array)



            foreach ($resultado as $materias) {
                # code...

                echo $materias->codigo."<br>";

               /* foreach ($materias as $materia) {
                    # code...
                    echo $materia->codigo."<br>";
                }*/
                
            }

        });

        //$excel = Excel::load('public/listado.xls')->all()->toArray();
        //dd($excel);
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
