<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosSCAD\Horario;
use App\ModelosNotas\Matricula;
use App\ModelosNotas\Item;
Use App\ModelosNotas\TipoItem;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
        
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

        
        $id_horario = $request->horario;
        $asignatura = Horario::find($id_horario);

        

        $estudiantes= $asignatura->matriculas;
        $tipo_item = $request->tipo_item;
        $nombre_item = $request->nombre;
        $porcetanje_item= $request->porcentaje;
        $descripcion_item= $request->descripcion;

        try {

             foreach ($estudiantes as $estudiante) {

           /* $verificar_item = array(
                            'matricula_id' => $estudiante->id
                            );
            
            $item = Item::firstOrNew($verificar_item);
            */
            $item = new Item();
            $item->matricula_id = $estudiante->id;
            $item->tipo_id= $tipo_item;
            $item->nombre= $nombre_item;
            $item->porcentaje= $porcetanje_item;
            $item->descripcion = $descripcion_item;
            $item->save();

            }

            echo "Guardado con exito";
            
        } catch (Exception $e) {

            echo "Ocurrio un error";
            
        }


       



    }


    public function calcularNotaItem($id_item){


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
