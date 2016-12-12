<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelosSCAD\Periodoacademico;
use App\ModelosSCAD\Programaacademico;
use App\ModelosSCAD\Horario;
use App\ModelosNotas\Estudiante;
use App\ModelosNotas\Item;
use App\ModelosSCAD\Usuario;


use App\Http\Requests;

class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PeriodosAcademicos = Periodoacademico::orderBy('Id','DESC')->get();
        $ProgramasAcademicos = Programaacademico::all();

        return view('admin.informes.informesIndex')->with('PeriodosAcademicos',$PeriodosAcademicos)->with('ProgramasAcademicos',$ProgramasAcademicos);    
    }

    public function crearPdf($vista){
     $pdf= \App::make('dompdf.wrapper');
     $pdf->loadHTML($vista);  
     return $pdf->stream('reporte');
    }

    public function crearReporteAsignatura($id){

        $vistaurl="admin.informes.partes.reporteAsignatura";
        $asignatura = Horario::find($id);
        $estudiantes = $asignatura->matriculas;
        $itemsPerdidos=$this->notasPerdidasEstudiantes($estudiantes);
        $vista= \View::make($vistaurl,compact('estudiantes','asignatura','itemsPerdidos'))->render();
        

       dd($vista);
       return $vista; 
    }
    public function crearReporteAsignaturaIterar($id){

        $vistaurl="admin.informes.partes.reporteAsigPart";
        $asignatura = Horario::find($id);
        $estudiantes = $asignatura->matriculas;
        $itemsPerdidos=$this->notasPerdidasEstudiantes($estudiantes);
        $vista= \View::make($vistaurl,compact('estudiantes','asignatura','itemsPerdidos'))->render();
        
       return $vista; 
    }

    public function ejecutarReporteAsignatura($id){
        $vista=$this->crearReporteAsignatura($id);
        return $this->crearPdf($vista);
    }

    public function notasPerdidasEstudiantes($matriculas){
        $items=array();
        foreach ($matriculas[0]->items as $item) {
        $items[]=["nombre"=>$item->nombre,"cantidad"=>0];
        }

        foreach ($matriculas as $matricula) {
            $cantidad = null;  
                foreach ($matricula->items as $item) {
                    for ($i=0; $i<count($items); $i++) { 
                        if($items[$i]['nombre'] == $item->nombre){  
                            if($item->pivot->nota < 3 ){
                            $items[$i]['cantidad']= $items[$i]['cantidad'] + 1;  
                        }             
                    }      
                }
            }           
        }
        return $items;
      }

    public function crearReporteProfesor($idProfesor,$idPeriodo,$idPrograma){
        $string ="";
        $profesor= Usuario::find($idProfesor);
        $programa = Programaacademico::find($idPrograma);
        $periodo=Periodoacademico::find($idPeriodo);
        $vistaurl= "admin.informes.partes.reporteProfesor";
        $materias = Horario::join('programaacademico_asignatura','horario.AsignaturaId' ,'=','programaacademico_asignatura.Id')
        ->join('programaacademico', 'programaacademico_asignatura.programaacademicoId', '=' ,'programaacademico.Id')
        ->join('asignatura', 'programaacademico_asignatura.AsignaturaId', '=' ,'asignatura.Id')
        ->join('usuario','horario.UsuarioID','=','usuario.Id')
        ->select('usuario.Id','usuario.Nombre as name','usuario.Apellidos','asignatura.Nombre', 'asignatura.Codigo','asignatura.Creditos','horario.Grupo','horario.Id as idHorario')
        ->where('usuario.Id',$idProfesor)
        ->where('horario.PeriodoAcademicoId','=',$idPeriodo)
        ->where('programaacademico.Id','=',$idPrograma)->get();
        foreach($materias as $materia){
            $string.=$this->crearReporteAsignaturaIterar(138);
        }
        $vista= \View::make($vistaurl,compact('profesor','programa','periodo','materias','string'))->render();

        return $this->crearPdf($vista);
        
    }  
      
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
