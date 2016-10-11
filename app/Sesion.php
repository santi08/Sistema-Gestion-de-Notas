<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;         

/**
 * Class Sesion
 */
class Sesion extends Authenticatable
{
    
    protected $connection = 'docentes';
    protected $table = 'sesion';
    protected $primaryKey = 'Id';

	public $timestamps = true;

    protected $fillable = [
        'UsuarioIdentificacion',
        'Contrasena',
        'Estado',
        'remember_token'
    ];

     public function getAuthPassword()
    {
        return $this->Contrasena;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    public function usuarios()
    {
       return $this->hasMany('App\Usuario','Id');
    }

    public function roles(){
        return $this->belongsToMany('App\Rol','');
    }

    public function sesionRoles(){
        return $this->hasMany('App\SesionRol','');
    }

        
}