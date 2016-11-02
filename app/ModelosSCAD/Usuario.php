<?php

namespace App\ModelosSCAD;


use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Usuario
 */
class Usuario extends Model
{
    protected $connection = 'docentes';
    protected $table = 'usuario';

    protected $primaryKey = 'Id';
	public $timestamps = true;
  

    protected $fillable = [
        'Identificacion',
        'Nombre',
        'Apellidos',
        'Correo',
        'Contacto'
    ];

    protected $guarded = [];

    public function sesion(){
        return $this->belongsTo('App\ModelosSCAD\Sesion','UsuarioIdentificacion');
    }

    public function programasAcademicos(){
        return $this->hasMany('App\ModelosSCAD\Programaacademico','UsuarioID');
    }

    public function horarios(){
        return $this->hasMany('App\ModelosSCAD\Horario', 'UsuarioID');
    }


  

        
}