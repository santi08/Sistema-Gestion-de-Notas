<?php

namespace App\ModelosSCAD;

use Illuminate\Database\Eloquent\Model;
use Hash;
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

       
        return Hash::make($this->Contrasena);

    }

     public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        
        dd($user->getAuthPassword());

        return $this->hasher->check($plain, $user->getAuthPassword());
    }


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    public function usuarios()
    {
       return $this->hasMany('App\ModelosSCAD\Usuario','Id','UsuarioIdentificacion');
    }

    public function roles(){
        return $this->belongsToMany('App\ModelosSCAD\Rol','');
    }

    public function sesionRoles(){
        return $this->hasMany('App\ModelosSCAD\SesionRol','sesionId');
    }

        
}