<?php

namespace App\ModelosSCAD;

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
    public $programa;

    protected $fillable = [
        'Grupo',
        'Salon',
        'UsuarioID',
        'PeriodoAcademicoId',
        'AsignaturaId'
    ];

    protected $guarded = [];
//relacion entre horario y periodoacademico
    public function periodoAcademico(){
        return $this->belongsTo('App\ModelosSCAD\Periodoacademico','PeriodoAcademicoId');
    }

//reacion de horario con usuario
    public function usuario(){
        return $this->belongsTo('App\ModelosSCAD\Usuario', 'UsuarioID');
    }
//relacion de horario con la tabla matricula de la base de datos de notas
    public function matriculas(){

        return $this->hasMany('App\ModelosNotas\Matricula');
    }
//relacion de horario con la tabla pivote de programaacademico_asignatura
    public function programaAcademicoAsignatura(){

        return $this->belongsTo ('App\ModelosSCAD\ProgramaacademicoAsignatura', 'AsignaturaId');
    }

    
       
    public function scopeAsignaturas($query,$programa)
    {
        
        if (!empty($programa)) {
            
                $query->whereHas('programaAcademicoAsignatura', function ($query)  use($programa) {
                                $query->where('programaacademicoId', '=', $programa);
                            })->get();
        }

    }

    public function scopePeriodo($query,$periodo){

        if(!empty($periodo)){
            $query->where('PeriodoAcademicoId','=',$periodo);
        }   
    }        
}