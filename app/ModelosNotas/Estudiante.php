<?php

namespace App\ModelosNotas;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='estudiantes';
    

    protected $fillable = [
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'email',
        'password',
        'codigo',
        'estado',
        'id_programaAcademico'
    ];

     public function programaAcademico(){

        return $this->belongsTo('App\ModelosSCAD\Programaacademico','id_programaAcademico','CodigoPrograma');
    }
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeCodigo($query,$usuario,$idPrograma){

        if(empty($idPrograma)){
          $query->where('codigo','like',$usuario.'%')
              ->orwhere('primerNombre','like',$usuario.'%')
              ->orwhere('segundoNombre','like',$usuario.'%')
              ->orwhere('primerApellido','like',$usuario.'%')
              ->orwhere('email','like',$usuario.'%');  
        }else {

            $query->where('id_programaAcademico','=',$idPrograma)
                  ->where(function($q) use ($usuario,$idPrograma){
                    $q->where('codigo','like',$usuario.'%')
                    ->orwhere('primerNombre','like',$usuario.'%')
                    ->orwhere('segundoNombre','like',$usuario.'%')
                    ->orwhere('primerApellido','like',$usuario.'%')
                    ->orwhere('email','like',$usuario.'%'); 

                  });
        }/*else {
             $query->join('matriculas','estudiantes.id','=','matriculas.estudiante_id')
                                        ->join('univalle_docentes.horario','matriculas.horario_id','=','univalle_docentes.horario.id')
                                        ->where('univalle_docentes.horario.PeriodoAcademicoId',$periodo)->get();
        }*/
    }

    public function scopePeriodo($query,$periodo){

        $query->join('matriculas','estudiantes.id','=','matriculas.estudiante_id')
                                        ->join('univalle_docentes.horario','matriculas.horario_id','=','univalle_docentes.horario.id')
                                        ->where('univalle_docentes.horario.PeriodoAcademicoId',$periodo)->get();
    }



     public function matriculas(){

        return $this->hasMany('App\ModelosNotas\Matricula');
    }
}
