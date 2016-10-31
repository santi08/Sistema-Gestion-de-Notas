<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
<<<<<<< HEAD
=======
use App\Usuario;



>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811
use App\Horario;
use App\Usuario;
use App\Programaacademico;
use App\ProgramaacademicoAsignatura;
use App\Periodoacademico;
use Maatwebsite\Excel\Facades\Excel;



class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD


           
            $ProgramasAcademicos = Programaacademico::all(); 
            $PeriodosAcademicos = Periodoacademico::all();
        
=======
>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811

           //$profesores = \DB::connection('docentes')->table('horario')->distinct('programaacademico.Id')->join('usuario', 'UsuarioID' ,'=' ,'usuario.Id')->join('programaacademico_asignatura', 'horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id')->join('asignatura','programaacademico_asignatura.AsignaturaId','=','asignatura.Id')->select('usuario.id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')->orderBy('usuario.Nombre','asc')->paginate(10);

            /* foreach ($profesores as $profesor) {
                # code...
                echo $profesor->nombre." ".$profesor->Apellidos." ".$profesor->NombrePrograma."<br>";
            } */


         /* $profesores = Horario::whereHas('programaAcademicoAsignatura', function ($query) {
                                $query->distinct();
                                })->groupBy(['UsuarioID'])->paginate(10); */

          /*$profesores = Usuario::join('horario','usuario.Id','=','horario.UsuarioID')
                                    ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' , 'programaacademico_asignatura.AsignaturaId')
                                    ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                    ->select('usuario.id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')->distinct()
                                    ->orderBy('usuario.Apellidos')->paginate(10);*/

<<<<<<< HEAD
          $profesores = Horario::distinct()
                                ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,                   'programaacademico_asignatura.Id')
                                ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
                                ->join('usuario','horario.UsuarioID','=','usuario.Id')
                                ->select('programaacademico.Id','usuario.id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')
                                ->orderBy('usuario.Nombre')->paginate(10);

      // dd($profesores);

           // $profesores = Horario::groupBy(['UsuarioID'])->paginate(10);

            /*$profesores = Horario::whereHas('programaAcademicoAsignatura', function($q) {
                                                $q->distinct('programaacademicoId');
                                            })->get();*/


         /*  dd(count($profesores)); 
                $numero = 1;                             
        
           foreach ($profesores as $profesor) {
            
            echo $numero." ".$profesor."<br>";
                //echo $profesor->Nombre."<br>";
                $numero++;
              
               // dd($profesor);
             // echo $profesor->usuario->Nombre."<br>";
              //echo $profesor->programaAcademicoAsignatura->programaAcademico->NombrePrograma."<br>";
             // echo $profesor->programaAcademicoAsignatura->programaAcademico->distinct()->get(['NombrePrograma']).'<br>';
           
               
            } */

           // $profesores = Usuario::all();

            //$asignaturas=\DB::connection('docentes')->table('horario')->join('usuario', 'UsuarioID' ,'=' ,'usuario.Id')->join('programaacademico_asignatura', 'horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id')->join('asignatura','programaacademico_asignatura.AsignaturaId','=','asignatura.Id')->select('horario.id','asignatura.codigo', 'asignatura.nombre','asignatura.creditos')->where('periodoacademicoId','=',5)->orderBy('usuario.nombre','asc')->get();


      return view('admin.profesores.profesoresIndex')->with('profesores',$profesores)->with('ProgramasAcademicos',$ProgramasAcademicos)->with('PeriodosAcademicos',$PeriodosAcademicos);
       
=======
>>>>>>> 5d61f77ba49863e098fdecb0e76bde2ab93e8811

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
           $resultado = $archivo->toArray();
           $archivo->skip(3);
            dd($resultado);

        $archivo->each(array)



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
