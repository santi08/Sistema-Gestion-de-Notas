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

        return $this->belongsTo('App\ModelosSCAD\ProgramaacademicoAsignatura', 'AsignaturaId');
    }

      public function scopePrograma ($query){

       $query = \DB::connection('docentes')->table('horario')->distinct('programaacademico.Id')->join('usuario', 'UsuarioID' ,'=' ,'usuario.Id')->join('programaacademico_asignatura', 'horario.AsignaturaId','=','programaacademico_asignatura.Id')->join('programaacademico','programaacademico_asignatura.programaacademicoId','=','programaacademico.Id')->join('asignatura','programaacademico_asignatura.AsignaturaId','=','asignatura.Id')->select('usuario.id','usuario.nombre','usuario.Apellidos','programaacademico.NombrePrograma')->where('periodoacademicoId','=',5);
       
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