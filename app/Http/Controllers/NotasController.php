<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\ModelosSCAD\Sesion;
use App\ModelosSCAD\Usuario;
use App\Http\Requests;
use App\ModelosNotas\Matricula;
use App\ModelosSCAD\Horario;
Use App\ModelosNotas\TipoItem;
use App\ModelosNotas\Item;
use App\ModelosNotas\Subitem;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


        $asignatura = Horario::find($id);
        $tipo_items=TipoItem::all(); 
        $estudiantes = $asignatura->matriculas;


       /* if (Gate::denies('registrar-notas', $asignatura)) {
            
        }*/

       if (Gate::forUser(\Auth::guard('admin')->user())->denies('registrar-notas', $asignatura)) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.notas.index')->with('estudiantes',$estudiantes)->with('asignatura',$asignatura)->with('tipo_items',$tipo_items);
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
    public function storeItem(Request $request)
    {

         if ($request->ajax()) {
           
            $nota = $request->get('nota');
            $id_matricula= $request->get('matricula');
            $id_item= $request->get('item');

            if ($nota == "") {
                $nota= null;
            }

            $matricula= Matricula::find($id_matricula);

            $matricula->items()->updateExistingPivot($id_item, array('nota'=> $nota));

        }
       
    }


     public function storeSubitem(Request $request)
    {

         if ($request->ajax()) {
           
            $nota = $request->get('nota');
            $id_matricula= $request->get('matricula');
            $id_subitem= $request->get('subitem');

            $subitem= Subitem::find($id_subitem);
            $item = $subitem->item;

            if ($nota == "") {
                $nota= null;
            }

            $matricula= Matricula::find($id_matricula);

            $matricula->subitems()->updateExistingPivot($id_subitem, array('nota'=> $nota));

            $nota_item = $this->calcularNotaItem($matricula);
            $matricula->items()->updateExistingPivot($item->id, array('nota'=> $nota_item));

        }
       
    }


    public function calcularNotaItem($matricula){

        
        $subitems= $matricula->subitems;

        $nota=0;

        foreach ($subitems as $subitem) {
                
                $nota_subitem = $subitem->pivot->nota;
                $porcentaje = ($subitem->porcentaje)/100;
                $nota_total= $nota_subitem * $porcentaje;

                $nota+=$nota_total;
        }
            
        return $nota;
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
