<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SesionRole
 */
class SesionRol extends Model
{
    protected $table = 'sesion_roles';
    protected $connection = 'docentes';

    public $timestamps = false;

    protected $fillable = [
        'RolesId',
        'sesionId'
    ];

    protected $guarded = [];

    public function sesion(){
    	return $this->belongsTo('App\Sesion');
    }

    public function rol(){
    	return $this->belongsTo('App\Rol','RolesId');
    }

        
}