<?php

namespace App\ModelosSCAD;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programaacademico
 */
class Programaacademico extends Model
{
    protected $table = 'programaacademico';
    protected $connection = 'docentes';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'NombrePrograma',
        'UsuarioID',
        'CodigoPrograma'
    ];

    protected $guarded = [];

    /*public function asignaturas(){
    	return $this->belonsToMany('App\Asignatura','programaacademico_asignatura','AsignaturaId','programaacademicoId');
    }*/

    public function usuario(){
    	return $this->belongsTo('App\ModelosSCAD\Usuario','UsuarioID');
    }

    public function programasAcademicosAsignaturas(){
    	return $this->hasMany('App\ModelosSCAD\ProgramaacademicoAsignatura','programaacademicoId');
    }

     public function estudiantes(){
        return $this->hasMany('App\ModelosNotas\Estudiante','id_programaAcademico');
    }

        
}