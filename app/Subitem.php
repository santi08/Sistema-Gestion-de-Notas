<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    //

	protected $table = 'subitems';

    protected $fillable = [
        'item_id',
        'nombre',
        'porcentaje',
        'nota',
        'descripcion'
      ];


    public function item(){

    	return $this->belongsTo('App\Item');
    }
}
