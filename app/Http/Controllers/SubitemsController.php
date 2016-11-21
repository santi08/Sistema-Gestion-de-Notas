<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosNotas\Item;
use App\ModelosNotas\Subitem;
use App\ModelosNotas\Matricula;

class SubitemsController extends Controller
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

       
        $id_item = $request->id_item;
        $item = Item::find($id_item);
        $estudiantes= $item->matriculas;



       
        $nombre_item = $request->nombre;
        $porcetanje_subitem= $request->porcentaje;
        $descripcion_subitem= $request->descripcion;

        try {

             $subitem = new Subitem();
             $subitem->item_id = $id_item;
             $subitem->nombre= $nombre_item;
             $subitem->porcentaje= $porcetanje_subitem;
             $subitem->descripcion = $descripcion_subitem;
             $subitem->save();

             foreach ($estudiantes as $estudiante) {

                $estudiante->subitems()->attach($subitem->id);                

            }

            return redirect()->back();
            
        } catch (Exception $e) {

            echo "Ocurrio un error";
            
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
}
