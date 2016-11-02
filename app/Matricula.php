<?php

namespace App;

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

        return $this->belongsTo('App\Estudiante');
    }
    

     public function horario(){

        return $this->belongsTo('App\Horario');
    }


     public function items()
    {
        return $this->belongsToMany('App\Item');
    }

}
