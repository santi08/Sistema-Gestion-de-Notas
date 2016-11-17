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

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    public function usuarios()
    {
       return $this->hasMany('App\ModelosSCAD\Usuario','Id','UsuarioIdentificacion');
    }

    public function roles(){
        return $this->belongsToMany('App\ModelosSCAD\Rol','sesion_roles','sesionId','RolesId');
    }

    public function sesionRoles(){
        return $this->hasMany('App\ModelosSCAD\SesionRol','sesionId');
    }

    public function rolCoordinador(){

        $Usuario = $this->usuarios[0];
        $programa = $Usuario->programasAcademicos;




        if (count($programa) > 0 ) {
                    
          return true;

        }else{


          return false;

        }
    }

    public function rolDocente(){

        $roles = $this->roles;
        $estado = false;

        foreach ($roles as $rol) {
            if ($rol->Nombre == 'DOCENTE') {
               $estado=  true;
               break;
            }else{
                $estado= false;
            }
        }

        
        return $estado;
    }

    public function rolAdministrador(){

        $roles = $this->roles;
        $estado = false;

        foreach ($roles as $rol) {
            if ($rol->Nombre == 'ADMINISTRADOR') {
               $estado=  true;
               break;
            }else{
                $estado= false;
            }
        }

        
        return $estado;
    }

        
}