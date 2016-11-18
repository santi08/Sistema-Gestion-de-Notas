<?php

namespace App\ModelosNotas;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

      
      protected $table = 'items';
      
      protected $fillable = [
        'tipo_id',
        'nombre',
        'porcentaje',
        'nota',
        'descripcion'
      ];


    public function matricula()
    {
        return $this->belongsTo('App\ModelosNotas\Matricula');
    }

    public function tipoitem(){

    	return $this->belongsTo('App\ModelosNotas\TipoItem');
    }

    public function subitems(){

    	return $this->hasMany('App\ModelosNotas\SubItem');
    }
}
