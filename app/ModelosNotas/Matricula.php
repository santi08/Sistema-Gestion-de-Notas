<?php

namespace App\ModelosNotas;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //

	protected $table = 'matriculas';
   // public $timestamps = false;
    

    protected $fillable = [
        'horario_id',
        'estudiante_id',
        'tipoMatricula',
        'estado',
        'definitiva'
    ];

    public function estudiante(){

        return $this->belongsTo('App\ModelosNotas\Estudiante');
    }
    

     public function horario(){

        return $this->belongsTo('App\ModelosSCAD\Horario');
    }


     public function items()
    {
        return $this->belongsToMany('App\ModelosNotas\Item')->withPivot('nota');
    }

}
