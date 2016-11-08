<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosNotas\Estudiante;
use Maatwebsite\Excel\Facades\Excel;
use App\ModelosNotas\Matricula;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


      public function matricularEstudiantes(){

        
        config(['excel.import.startRow' => 4 ]);

        Excel::selectSheetsByIndex(0)->load('public/listado.xls',function($archivo)
        {
        
            $estudiantes = $archivo->get();
            dd($estudiantes);
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

        //$excel = Excel::load('public/listado.xls')->all()->toArray();
        //dd($excel);

    }

    public function leerEncabezado(){

         Excel::selectSheetsByIndex(0)->load('public/listado.xls',function($archivo)
        {

            $archivo->noHeading();
            $encabezado = $archivo->limit(3)->get();
            //dd($encabezado);
            $codigoMateria = $encabezado[1];
            dd($codigoMateria[1]);

            $estudiantes = Estudiante::join('matriculas','estudiantes.id','=','matriculas.estudiante_id')
                                        ->join('horaios','matriculas.horario_id','=','horarios.id')
                                        ->where('PeriodoAcademicoId',$variable)->get();


        });


    }

     public function leerArchivo(){

       //Extraer todo el contenido del fichero
          /*  $ruta = 'C:\xampp\htdocs\SistemaNotas\public\Matriculados.txt';

            $archivo = fopen($ruta, "r");
            $x = 1;
            $estudiantes = array();
            while(!feof($archivo))
            {
               $estudiante = fgets($archivo);
               array_push($estudiantes, $estudiante);
            $x++;
            }

            fclose($archivo);
         dd($estudiantes);
         */

          $lineas = file('C:\xampp\htdocs\SistemaNotas\public\Matriculados.txt');
            $estudiantes = array();

                

            foreach ($lineas as $linea) {

                $estudiante = new Estudiante();
                $datos = explode("\t",$linea);
                echo $datos;

               
                //array_push($estudiantes, $estudiante); 
            }

                
    }

    
}
