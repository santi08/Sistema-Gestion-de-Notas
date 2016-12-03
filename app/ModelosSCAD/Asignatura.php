<?php

namespace App\ModelosSCAD;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 */
class Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $connection = 'docentes';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Nombre',
        'Creditos',
        'HorasSemanales'
    ];

    protected $guarded = [];

    public function programasacademicos(){
        return $this->belongsToMany('App\ModelosSCAD\Programaacademico','AsignaturaId','programaacademicoId');
    }

    public function programasAcademicosAsignaturas(){
        return $this->hasMany('App\ModelosSCAD\ProgramaacademicoAsignatura', 'AsignaturaId');
    }

    

}