<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 */
class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'Id';

	public $timestamps = false;
    protected $connection = 'docentes';

    protected $fillable = [
        'Identificacion',
        'Nombre',
        'Apellidos',
        'Correo',
        'Contacto'
    ];

    protected $guarded = [];

    public function sesiones(){
        return $this->hasMany('App\Sesion','UsuarioIdentificacion');
    }

    public function programasAcademicos(){
        return $this->hasMany('App\Programaacademico','UsuarioID');
    }

    public function horarios(){
        return $this->hasMany('App\Horario', 'UsuarioID');
    }

        
}