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
        
        $id_horario = $request->horario;
        $asignatura = Horario::find($id_horario);

        

        $estudiantes= $asignatura->matriculas;
        $tipo_item = $request->tipo_item;
        $nombre_item = $request->nombre;
        $porcetanje_item= $request->porcentaje;
        $descripcion_item= $request->descripcion;

        try {

             $item = new Item();
             $item->tipo_id= $tipo_item;
             $item->nombre= $nombre_item;
             $item->porcentaje= $porcetanje_item;
             $item->descripcion = $descripcion_item;
             $item->save();

             foreach ($estudiantes as $estudiante) {

                $estudiante->items()->attach($item->id);                

            }

            return redirect()->back();
            
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
        $item = Item::find($id);

        $matriculas = $item->matriculas;

        if ($this->validarItemSinNotas($item)) {

             try {

                foreach ($matriculas as $matricula) {

                    $item->matriculas()->detach($matricula->id);     
                }

                    $item->delete();
            echo "Eliminado con exito";
                 
             } catch (Exception $e) {
                 
             }

        }else{

            dd('Item contiene notas, primero elimina las notas para eliminar el item');
        }



    }

    public function validarItemSinNotas($item){

         $estado = false;

        foreach ($item->matriculas as $nota) {
            
            if (!is_null($nota->pivot->nota)) {

                $estado = false;
                break;
            }else{
                $estado = true;
            }
        }

        return $estado;


    }
}
