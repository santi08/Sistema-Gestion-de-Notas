<?php

namespace App\ModelosNotas;

use Illuminate\Database\Eloquent\Model;

class TipoItem extends Model
{
    //

  protected $table = 'tipo_items';

  protected $fillable = [
        'nombre'
  ];


  public function items(){

  	return $this->hasMany('App\ModelosNotas\Item');
  }

}
