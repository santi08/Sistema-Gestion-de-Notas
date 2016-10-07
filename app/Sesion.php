<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sesion
 */
class Sesion extends Model
{
    protected $table = 'sesion';
    protected $connection = 'docentes';

    protected $primaryKey = 'Id';

	public $timestamps = true;

    protected $fillable = [
        'UsuarioIdentificacion',
        'Contrasena',
        'Estado',
        'remember_token'
    ];

    protected $guarded = [];

    public function usuario()
    {
       return $this->hasMany('App\Usuario','UsuarioIdentificacion');
    }

    public function roles(){
        return $this->belongsToMany('App\Rol','');
    }

    public function sesionRoles(){
        return $this->hasMany('App\SesionRol','');
    }

        
}