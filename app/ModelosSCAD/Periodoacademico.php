<?php

namespace App\ModelosSCAD;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Periodoacademico
 */
class Periodoacademico extends Model
{
    protected $table = 'periodoacademico';
    protected $connection = 'docentes';


    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Ano',
        'Periodo',
        'Semanas',
        'InicioPeriodo',
        'FinPeriodo'
    ];

    protected $guarded = [];

    public function horarios(){
        return $this->hasMany('App\ModelosSCAD\Horario','PeriodoAcademicoId');
    }

   
        
}