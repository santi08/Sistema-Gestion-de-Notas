<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 */
class Horario extends Model
{
    protected $connection = 'docentes';   
    protected $table = 'horario';
    protected $primaryKey = 'Id';
	public $timestamps = false;

    protected $fillable = [
        'Grupo',
        'Salon',
        'UsuarioID',
        'PeriodoAcademicoId',
        'AsignaturaId'
    ];

    protected $guarded = [];

    public function periodoAcademico(){
        return $this->belongsTo('App\Periodoacademico','PeriodoAcademicoId');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario', 'UsuarioID');
    }

    public function programaAcademicoAsignatura(){
        return belongsTo('App\ProgramaacademicoAsignatura', 'AsignaturaId');
    }

        
}