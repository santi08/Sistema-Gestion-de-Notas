<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosNotas\Estudiante;
use Maatwebsite\Excel\Facades\Excel;
use App\ModelosNotas\Matricula;
use App\ModelosSCAD\Horario;
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
    public function index()
    {
        //
        $estudiantes = Matricula::all();

        foreach ($estudiantes as $estudiante) {
            # code...
            if ($estudiante->estado == true ) {
                # code...
                echo $estudiante->estudiante->primerNombre." ";
                echo $estudiante->horario->programaAcademicoAsignatura->asignatura->Nombre."<br>";
            }else{
                echo $estudiante->estudiante->primerNombre."Sin Matricular"."<br>";
            }
            
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
        $codigo = $request->codigo;
        $asignatura = $request->horario;

        $estudiante = Estudiante::where('codigo',$codigo)->first();

        $matricula = new Matricula();

        $matricula->horario_id= $asignatura;
        $matricula->estudiante_id= $estudiante->id;
        $matricula->tipoMatricula= 'N';
        $matricula->estado= 0;
       // $ma


                dd($asignatura);
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
        
        $id_horario = $request->horario;
        $file = $request->file;
        //dd($file);
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
            //
            
            //dd($estudiantes);

        //$archivo->each(array)



           /* foreach ($resultado as $materias) {
                # code...

                echo $materias->codigo."<br>";

               /* foreach ($materias as $materia) {
                    # code...
                    echo $materia->codigo."<br>";
                }
                
            }*/

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

         //dd($codigoMateria);
         //dd($codigoEncabezado);
         //dd($grupoEncabezado);
         //dd($grupoMateria);

          if($codigoEncabezado == $codigoMateria && $grupoEncabezado == $grupoMateria){

                
                return true ;

            }else{

                return false;
                
            }

       
           
           
    }

    public function autocomplete(Request $request){


        if ($request->ajax()) {
        
        $codigo = $request->codigo);

        

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
