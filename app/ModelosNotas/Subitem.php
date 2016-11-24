<?php

namespace App\ModelosNotas;

use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    //

	protected $table = 'subitems';

    protected $fillable = [
        'item_id',
        'nombre',
        'porcentaje',
        'descripcion'
      ];


    public function item(){
    	return $this->belongsTo('App\ModelosNotas\Item');
    }

     public function matriculas()
    {
        return $this->belongsToMany('App\ModelosNotas\Matricula','subitem_matricula')->withPivot('id','nota');

    }
}
