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
    public function store(Request $request){   
      
        $id_item = $request->id_item;
        $item = Item::find($id_item);
        $estudiantes= $item->matriculas;
        $nombre_item = $request->nombre;
        
        $descripcion_subitem= $request->descripcion;

        if($request->porcentaje==""){
            $asignadoPorUsuario= false;
            $porcetanje_subitem =0;
        }else{
            $porcetanje_subitem= $request->porcentaje;
            $asignadoPorUsuario= true;
        }

        if ($this->porcentajeAsignadoItem($item) - $request->porcentaje >=0) {
            try {

             $subitem = new Subitem();
             $subitem->item_id = $id_item;
             $subitem->nombre= $nombre_item;
             $subitem->porcentaje= $porcetanje_subitem;
             $subitem->asignadoPorUsuario = $asignadoPorUsuario;
             $subitem->descripcion = $descripcion_subitem;
             $subitem->save();
                 foreach ($estudiantes as $estudiante) {

                    $estudiante->subitems()->attach($subitem->id);                

                }

                if($request->porcentaje==""){
                   $this->actualizarPorcentajes($item);
                }
                flash('EL subitem se registro con exito', 'success');
                return redirect()->back();
            
            } catch (Exception $e) {
                flash('Ocurrio un error por favor intenta de nuevo', 'danger');
                return redirect()->back();
            }
        }else{
            flash('El porcentaje del subitem supera el 100% disponible del item '.$item->nombre, 'warning');
            return redirect()->back(); 
        }
             
    }

    public function actualizarPorcentajes($item){

        $subitems = $item->subitems()->where('asignadoPorUsuario',false)->get();
        $porcentajeSinAsignar = $this->porcentajeAsignadoItem($item);
        $subitemsSinAsignar = count($subitems);

        foreach ($subitems as $subitem) {
                $subitem->porcentaje = $porcentajeSinAsignar/$subitemsSinAsignar;
                $subitem->save();
        }

    }

    public function porcentajeAsignadoItem($item){

        $porcentajeTotal = 100;

        if(count($item->subitems)>0){

             $porcentajeUtilizado=0;

            foreach ($item->subitems as $subitem) {

                if($subitem->asignadoPorUsuario == true){
                   $porcentajeUtilizado+= $subitem->porcentaje; 
                }
                
            }

            $porcentajeDisponible= $porcentajeTotal - $porcentajeUtilizado;

            return $porcentajeDisponible;

        }else{

            return $porcentajeTotal;
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
        $subitem = Subitem::find($id);
         if ($this->validarSubitemSinNotas($subitem)) {

             try {

            $subitem->delete();
            flash('EL subitem ha sido eliminado con exito', 'success');
            return redirect()->back();
                 
             } catch (Exception $e) {
                 
             }

        }else{

            flash('El subitem contiene notas registradas, primero elimina las notas para eliminar el subitem', 'warning');
            return redirect()->back();
            
        }
    }

     public function validarSubitemSinNotas($subitem){

         $estado = false;

        foreach($subitem->matriculas as $nota) {
            
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
