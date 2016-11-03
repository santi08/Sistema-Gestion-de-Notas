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

    public function periodoAcademico(){
        return $this->belongsTo('App\ModelosSCAD\Periodoacademico','PeriodoAcademicoId');
    }

    public function usuario(){
        return $this->belongsTo('App\ModelosSCAD\Usuario', 'UsuarioID');
    }

    public function matriculas(){

        return $this->hasMany('App\ModelosNotas\Matricula');
    }

    public function programaAcademicoAsignatura(){

        return $this->belongsTo ('App\ModelosSCAD\ProgramaacademicoAsignatura', 'AsignaturaId');
    }

      public function scopePrograma ($query){

       
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