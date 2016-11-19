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


    public function matriculas()
    {
        return $this->belongsToMany('App\ModelosNotas\Matricula')->withPivot('nota');

    }

    public function tipoitem(){

    	return $this->belongsTo('App\ModelosNotas\TipoItem');
    }

    public function subitems(){

    	return $this->hasMany('App\ModelosNotas\SubItem');
    }
}
