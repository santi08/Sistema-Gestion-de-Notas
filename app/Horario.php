<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 */
class Horario extends Model
{
    protected $table = 'horario';
    protected $connection = 'docentes';

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
        return $this->belongsTo('App\Periodoacademico','PeriodoAcademicoId');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario', 'UsuarioID');
    }

    public function programaAcademicoAsignatura(){
        return $this->belongsTo('App\ProgramaacademicoAsignatura', 'AsignaturaId');
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