<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosNotas\Estudiante;
use Maatwebsite\Excel\Facades\Excel;
use App\ModelosNotas\Matricula;
use App\ModelosSCAD\Horario;
use App\ModelosSCAD\Periodoacademico;
use Response;


class MatriculasController extends Controller
{

    private $codigoEncabezado ="";
    private $grupoEncabezado ="";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodos = Periodoacademico::orderBy('Id','DESC')->get();
        $guard= 'admin';
        $id_periodo= $request->get('periodo');
        $estudiantes = Matricula::all();
        $id_usuario = \Auth::guard($guard)->user()->UsuarioIdentificacion;

        if ($request->ajax()) {
           
            $asignaturas = Horario::where('UsuarioID',$id_usuario)->where('PeriodoAcademicoId',$id_periodo)->get();

            return response()->json(view('admin.matriculas.parts.lista',compact('asignaturas'))->render());

        }else{
             $asignaturas = Horario::where('UsuarioID',$id_usuario)->get();  
        }

        


         return view('admin.matriculas.index')->with('periodos',$periodos)->with('asignaturas',$asignaturas);
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

        try {

        $codigo = $request->codigo;
        $id_horario = $request->horario_estudiante;

        $estudiante = Estudiante::where('codigo',$codigo)->first();

        $verificar_matricula = array(
                            'horario_id' => $id_horario,
                            'estudiante_id' => $estudiante->id
                            );
    
        $matricula = Matricula::firstOrNew($verificar_matricula);
                        $matricula->estudiante_id= $estudiante->id;
                        $matricula->tipoMatricula = 'N';
                        $matricula->estado= 0;
                        $matricula->save();



                echo "Se ha matriculado a".$estudiante->primerNombre.' '.$estudiante->primerApellido.' Exitosamente';
            
        } catch (Exception $e) {

                dd('Se ha producido un error, intentelo de nuevo');
            
        }

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


      public function matricularEstudiantes(Request $request){
        
        $id_horario = $request->horario_archivo;
        $file = $request->file;
        $horario = Horario::find($id_horario);
       

        $codigoMateria = $horario->programaAcademicoAsignatura->asignatura->Codigo;
        $grupoMateria = $horario->Grupo;



       if ($this->leerEncabezado($codigoMateria,  $grupoMateria, $file )){

        config(['excel.import.startRow' => 4 ]);

        Excel::selectSheetsByIndex(0)->load($file,function($archivo) use ($id_horario)
        {
                    
            $estudiantes = $archivo->get();
            //dd($estudiantes);


            foreach ($estudiantes as $estudiante) {

                # code...

                if (!is_null($estudiante->codigo)) {

                $codigo = substr($estudiante->codigo, 2).'-'.$estudiante->programa;
                //dd($codigo);

                $e = Estudiante::where('codigo',$codigo)->first();

                  try {

                        $nuevos=0;
                        $actualizado = 0;

                        $verificar_matricula = array(
                            'horario_id' => $id_horario,
                            'estudiante_id' => $e->id
                            );

                        $matricula = Matricula::firstOrNew($verificar_matricula);
                        $matricula->estudiante_id= $e->id;
                        $matricula->tipoMatricula = $estudiante->t_mat;
                        $matricula->estado=1;
                        $matricula->save();

                      
                  } catch (Exception $e) {

                     dd($e);
                      
                  }
                 
                }
              
            }
           

        });

        
       }else{

            dd('encabezado no valido');
       }

        

       

       


        
        
        
        //$excel = Excel::load('public/listado.xls')->all()->toArray();
        //dd($excel);

    }

    public function leerEncabezado( $codigoMateria, $grupoMateria, $file ){

        
       global $codigoEncabezado, $grupoEncabezado;
       
              

         Excel::selectSheetsByIndex(0)->load($file ,function($archivo) use ($codigoMateria,$grupoMateria)
        {
            
            global $codigoEncabezado, $grupoEncabezado;
           
            $archivo->noHeading();
            $encabezado = $archivo->limit(3)->get();
           
            $obtenerListado = $encabezado[1][1];
                  

            $procesarListado = explode(" ", $obtenerListado);
            
         // dd($procesarListado);
           

            for ($i=0;  $i<count($procesarListado) ; $i++) { 
                # code...
            
                if($procesarListado[$i]=="ASIGNATURA:"){
                    $codigoEncabezado = $procesarListado[$i+1];
                }

                

                if($procesarListado[$i]=="Gr.:"){
                   $grupoEncabezado = $procesarListado[$i+1];
                }
            }
        });

          if($codigoEncabezado == $codigoMateria && $grupoEncabezado == $grupoMateria){

                return true ;

            }else{

                return false;
                
            }

       
           
           
    }

    public function materias(){

        $guard= 'admin';
        $usuario =\Auth::guard($guard)->user()->usuarios[0];
        $asignaturas =  $usuario->horarios;

       dd($asignaturas);

     
       
    }

    public function autocomplete(Request $request){


        if ($request->ajax()) {
        
        $codigo = $request->codigo;

        

        $estudiantes = Estudiante::where('estado', true)->where('codigo'. 'LIKE','%'.$codigo.'%')->select('codigo')
        ->take(5)->get();

        $results = array();

        foreach ($estudiantes as $estudiante){

            $results[] = [ 'codigo' => $estudiante->codigo, 'value'=> $estudiante->codigo ];
        }

        return response()->json($results);
        }
       
    }


    

    
}
