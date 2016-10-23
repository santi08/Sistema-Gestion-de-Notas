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
        $this->programa = $programa;

        echo $this->programa;

        if (!empty($programa)) {
            /*$query->join('programaacademico_asignatura','horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico.Id','=','programaacademico_asignatura.programaacademicoId')->join('asignatura','asignatura.Id','=','programaacademico_asignatura.AsignaturaId')->where('programaacademico.Id','=',$programa);*/

            /*$query->with(['programaAcademicoAsignatura' => function ($query) {
                $query->where('programaacademicoId', '=', $this->programa);

                }],'asignatura');*/

                $query->whereHas('programaAcademicoAsignatura', function($query)
                    {
                    $query->where('programaacademicoId', '=', $this->programa); 

                });


        }

       

    
    }

    public function scopePeriodo($query,$periodo){

        if(!empty($periodo)){
            $query->where('PeriodoAcademicoId','=',$periodo);

        }
        
    }





    


        
}