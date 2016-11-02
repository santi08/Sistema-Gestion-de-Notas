<?php

namespace App;

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


    public function matriculas()
    {
        return $this->belongsToMany('App\Matricula');
    }

    public function tipoitem(){

    	return $this->belongsTo('App\TipoItem');
    }

    public function subitems(){

    	return $this->hasMany('App\SubItem');
    }
}
