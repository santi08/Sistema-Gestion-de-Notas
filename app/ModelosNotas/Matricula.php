<?php

namespace App\ModelosNotas;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //

	protected $table = 'matriculas';
    

    protected $fillable = [
        'id_horario',
        'id_estudiante',
        'tipoMatricula',
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
        return $this->belongsToMany('App\ModelosNotas\Item');
    }

}
