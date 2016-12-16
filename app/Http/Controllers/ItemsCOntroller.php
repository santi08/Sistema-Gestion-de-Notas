<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ModelosSCAD\Horario;
use App\ModelosNotas\Matricula;
use App\ModelosNotas\Item;
use App\ModelosNotas\Subitem;
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
        $id_tipo_item = $request->tipo_item;
        $nombre_item = $request->nombre;
        $porcetanje_item= $request->porcentaje;
        $descripcion_item= $request->descripcion;

        $tipo_item = TipoItem::find($id_tipo_item);

        if ($this->validarPorcentaje($estudiantes[0]) - $porcetanje_item > 0){

            if ($tipo_item->nombre == "PARCIALES") {
            try {

                 $item = new Item();
                 $item->tipo_id= $id_tipo_item;
                 $item->nombre= $nombre_item;
                 $item->porcentaje= $porcetanje_item;
                 $item->descripcion = $descripcion_item;
                 $item->save();

                foreach ($estudiantes as $estudiante) {

                    $estudiante->items()->attach($item->id);
                } 


                 $subitem_parcial = new Subitem();
                 $subitem_parcial->item_id = $item->id;
                 $subitem_parcial->nombre= $nombre_item;
                 $subitem_parcial->porcentaje= 100;
                 $subitem_parcial->asignadoPorUsuario = 0;
                 $subitem_parcial->save();

                foreach ($estudiantes as $estudiante) {

                    $estudiante->subitems()->attach($subitem_parcial->id);                

                }

                 $subitem_opcional = new Subitem();
                 $subitem_opcional->item_id = $item->id;
                 $subitem_opcional->nombre= 'OPCIONAL';
                 $subitem_opcional->porcentaje= 100;
                 $subitem_opcional->asignadoPorUsuario = 0;
                 $subitem_opcional->save();

                foreach ($estudiantes as $estudiante) {

                    $estudiante->subitems()->attach($subitem_opcional->id);                

                }

                 flash('El item ha sido registrado con exito', 'success');
                return redirect()->back();
                        
            } catch (Exception $e) {
                flash('Ocurrio un error por favor intenta de nuevo', 'danger');
                return redirect()->back();  
            }
            

            }else{

                try {

                 $item = new Item();
                 $item->tipo_id= $id_tipo_item;
                 $item->nombre= $nombre_item;
                 $item->porcentaje= $porcetanje_item;
                 $item->descripcion = $descripcion_item;
                 $item->save();

                    foreach ($estudiantes as $estudiante) {

                        $estudiante->items()->attach($item->id);                

                    }
                        flash('El item ha sido registrado con exito', 'success');
                        return redirect()->back();
                
                } catch (Exception $e) {

                    flash('Ocurrio un error por favor intenta de nuevo', 'danger');
                    return redirect()->back();
                }
            }
           
        }else{

            flash('El porcentaje del item supera el 100% disponible en la asignatura', 'warning');
            return redirect()->back(); 
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
        $item = Item::find($id);
        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        

        $id_item= $request->id_item;

        $item= Item::find($id_item);
        $tipo_item =TipoItem::find($request->tipo_item);
        $porcentaje_disponible= $this->validarPorcentaje($item->matriculas[0]) + $item->porcentaje;

        if ($porcentaje_disponible - $request->porcentaje >= 0){

            if($tipo_item->nombre != "PARCIALES"){
                $item->nombre = $request->nombre_item;
                $item->porcentaje = $request->porcentaje;
                $item->tipo_id= $request->tipo_item;
                $item->descripcion = $request->descripcion;
                $item->save();
                flash('El item ha sido editado exitosamente', 'success');
                return redirect()->back();
            }else if($item->tipo_id == $request->tipo_item){
                $item->nombre = $request->nombre_item;
                $item->porcentaje = $request->porcentaje;
                $item->tipo_id= $request->tipo_item;
                $item->descripcion = $request->descripcion;
                $item->save();
                flash('El item ha sido editado exitosamente', 'success');
                return redirect()->back();
            }else{

                flash('No es posible cambiar el tipo de item a parciales', 'warning');
                return redirect()->back();
            }

        }else{

            flash('El porcentaje del item supera el 100% disponible en la asignatura', 'warning');
            return redirect()->back(); 

        }
    }

    public function actualizarNotas($item){

        $matriculas = $item->matriculas;
        

        foreach ($matriculas as $matricula) {
           
          $nota_previa = $matricula->items;
          dd($nota_previa);
        }


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

              $item->delete();
              flash('El item ha sido eliminado con exito', 'success');
              return redirect()->back();
                 
             } catch (Exception $e) {
                 
             }

        }else{
            flash('El item contiene notas o subitems asociados, primero elimina las notas o los subitems para poder eliminar el item', 'warning');
           return redirect()->back();
        }



    }

    public function validarItemSinNotas($item){

         $estado = false;

        foreach ($item->matriculas as $nota) {
            
            if (!is_null($nota->pivot->nota) && ($nota->pivot->nota) != 0) {
                $estado = false;
                break;
            }else{
                $estado = true;
            }
        }

        return $estado;
    }

    public function validarPorcentaje($matricula){
          $porcentajeTotal = 100;

        if(count($matricula->items)>0){

            $porcentajeUtilizado=0;

            foreach ($matricula->items as $item) {
                
                $porcentajeUtilizado+=$item->porcentaje;
            }

            $porcentajeDisponible = $porcentajeTotal - $porcentajeUtilizado;

            return $porcentajeDisponible;
        }else{

            return $porcentajeTotal;
        }
    }

}
