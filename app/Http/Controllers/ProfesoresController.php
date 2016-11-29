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
use Illuminate\Support\Collection as Collection;



class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function paginateArray($data, $perPage)
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath()
        ]);
    }
    public function index(Request $request)
    {
        
        $ProgramasAcademicos = Programaacademico::all(); 
        $PeriodosAcademicos = Periodoacademico::orderBy('id','DESC')->get();
        $profesores=array();   
          
        // periodo activo, programa desactivo,nombreBusqueda desactivo
       /* if(!empty($request->get('periodo')) and empty($request->get('programa')) and empty($request->get('nombreBusqueda')) and $request->ajax()) {

            $profesores=Horario::distinct()
            ->join('usuario','horario.UsuarioID',"=","usuario.Id")
            ->join('programaacademico_asignatura','horario.AsignaturaId',"=","programaacademico_asignatura.Id")
            ->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id') 
            ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma','programaacademico.Id as idprograma')
            ->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))  
            ->orderBy('usuario.Apellidos','ASC')->get()->toArray();

            $profesores= $this->paginateArray($profesores,10);
           
           return response()->json(view('admin.profesores.partialTable',compact('profesores'))->render());    
        }
        //periodo activo, programa activo,nombre desactivo
        if(!empty($request->get('periodo')) and !empty($request->get('programa')) and empty($request->get('nombreBusqueda')) ){
             $profesores = Horario::distinct()
            ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,'programaacademico_asignatura.Id')
            ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
            ->join('usuario','horario.UsuarioID','=','usuario.Id')

            ->select('usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma','programaacademico.Id as idprograma')
            ->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))
            ->where('programaacademico_asignatura.programaacademicoId','=',$request->get('programa'))->orderBy('usuario.Apellidos')->get()->toArray();   
           $profesores= $this->paginateArray($profesores,10);
           
           return response()->json(view('admin.profesores.partialTable',compact('profesores'))->render());
        };

        if(!empty($request->get('periodo')) and empty($request->get('programa')) and !empty($request->get('nombreBusqueda')) ){

             $profesores = Horario::distinct()
            ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,'programaacademico_asignatura.Id')
            ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
            ->join('usuario','horario.UsuarioID','=','usuario.Id')
            ->select('programaacademico.Id as idprograma', 'usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')
            ->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))
            ->where(function($q)use($request){
            $q->where('usuario.Nombre','like',$request->get('nombreBusqueda').'%')
            ->orWhere('usuario.Apellidos','like',$request->get('nombreBusqueda').'%');
            })->orderBy('usuario.Apellidos')->get()->toArray();
               
           $profesores= $this->paginateArray($profesores,10);
           
           return response()->json(view('admin.profesores.partialTable',compact('profesores'))->render());
        };

        if(!empty($request->get('periodo')) and !empty($request->get('programa')) and !empty($request->get('nombreBusqueda')) ){

             $profesores = Horario::distinct()
            ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,'programaacademico_asignatura.Id')
            ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
            ->join('usuario','horario.UsuarioID','=','usuario.Id')
            ->select('programaacademico.Id as idprograma', 'usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')
            ->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))
            ->where('programaacademico_asignatura.programaacademicoId','=',$request->get('programa'))
            ->where(function($q)use($request){
            $q->where('usuario.Nombre','like',$request->get('nombreBusqueda').'%')
            ->orWhere('usuario.Apellidos','like',$request->get('nombreBusqueda').'%');
            })->orderBy('usuario.Apellidos')->get()->toArray();
               
           $profesores= $this->paginateArray($profesores,10);
           
           return response()->json(view('admin.profesores.partialTable',compact('profesores'))->render());
        };*/

       if($request->ajax()){
         $profesores = Horario::distinct()
            ->join('programaacademico_asignatura', 'horario.AsignaturaId' ,'=' ,'programaacademico_asignatura.Id')
            ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
            ->join('usuario','horario.UsuarioID','=','usuario.Id')
            ->select('programaacademico.Id as idprograma', 'usuario.Id','usuario.Nombre','usuario.Apellidos','programaacademico.NombrePrograma')
            ->where('horario.PeriodoAcademicoId','like',$request->get('periodo')."%")
            ->where('programaacademico_asignatura.programaacademicoId','like',$request->get('programa')."%")
            ->where(function($q)use($request){
            $q->where('usuario.Nombre','like',$request->get('nombreBusqueda').'%')
            ->orWhere('usuario.Apellidos','like',$request->get('nombreBusqueda').'%');
            })->orderBy('usuario.Apellidos')->get()->toArray();
               
           $profesores= $this->paginateArray($profesores,10);
           
           return response()->json(view('admin.profesores.partialTable',compact('profesores'))->render());
       }


      return view('admin.profesores.index')->with('ProgramasAcademicos',$ProgramasAcademicos)->with('PeriodosAcademicos',$PeriodosAcademicos);
    
    }

     
    public function ver(Request $request,$id,$idprograma){

        $profesor = Horario::join('programaacademico_asignatura','horario.AsignaturaId' ,'=','programaacademico_asignatura.Id')
        ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
        ->join('asignatura', 'programaacademico_asignatura.AsignaturaId', '=' ,'asignatura.Id')
        ->join('usuario','horario.UsuarioID','=','usuario.Id')
        ->select('usuario.Id','usuario.Nombre as name','usuario.Apellidos','asignatura.Nombre', 'asignatura.Codigo','asignatura.Creditos','horario.Grupo')
        ->where('usuario.Id',$id)
        ->where('horario.PeriodoAcademicoId','=',$request->get('periodo'))
        ->where('programaacademico.Id','=',$idprograma)->get();
                            
        
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
