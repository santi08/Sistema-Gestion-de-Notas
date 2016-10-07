<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramaacademicoAsignatura
 */
class ProgramaacademicoAsignatura extends Model
{
    protected $table = 'programaacademico_asignatura';
    protected $connection = 'docentes';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'AsignaturaId',
        'programaacademicoId'
    ];

    protected $guarded = [];

    public function asignatura(){
    	return $this->belongsTo('App\Asignatura','AsignaturaId');
    }

    public function programaAcademico(){
    	return $this->belongsTo('App\Programaacademico','programaacademicoId');
    }

    public function horarios(){
    	return $this->hasMany('App\Horario','AsignaturaId');
    }

    

        
}